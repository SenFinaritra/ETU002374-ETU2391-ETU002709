<?php


    class crud 
    {   
        private $host="172.10.0.113";
        private $user="ETU002709";
        private $password="nV9WXEuaAvRB";
        private $base="db_p16_ETU002709";

        // private $host="localhost";
        // private $user="root";
        // private $password="";
        // private $base="The";
        
        
        private $conn;

        public function connect() {
            try {
                
                $this->conn = mysqli_connect($this->host,$this->user,$this->password,$this->base);
                
                return $this->conn;
            } catch(Exception $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }

        
        public function getConnection(){
            return $this->connect();
        }










        public function insert($object) {
            $className = get_class($object);
            $reflectionClass = new ReflectionClass($className);
            $properties = $reflectionClass->getProperties();
            $propertyNames = [];
            $propertyValues = [];
    
            foreach ($properties as $property) {
                $propertyName = $property->getName();
                $propertyValue = $property->getValue($object);
                if ($propertyValue !== null) {
                    $propertyNames[] = $propertyName;
                    if(is_string($propertyValue) || strtotime($propertyValue)){
                        $propertyValues[] = "'".$propertyValue."'";
                    }
                    else{
                        $propertyValues[] = $propertyValue;
                    }
                }
            }
            $this->conn=$this->getConnection();
            $sql = "INSERT INTO $className (" . implode(', ', $propertyNames) . ") VALUES (" . implode(', ', $propertyValues) . ")";
            echo $sql;
            $query=mysqli_query($this->conn,$sql);
            
            $this->conn = null;
        }
    
        
        









        public function select($object, $sql) {
            $className = get_class($object);
            $reflectionClass = new ReflectionClass($className);
            $properties = $reflectionClass->getProperties();
            $propertyNames = [];
            $propertyValues = [];
                    
            $this->conn = $this->getConnection();
            
            $objects = [];
        
            // Exécutez la requête SQL
            $results = $this->conn->query($sql);
        
            if ($results) {
                if ($results->num_rows > 0) {
                    while ($row = $results->fetch_assoc()) {
                        $newObject = new $className();
                        foreach ($row as $key => $value) {
                            // Vérifiez si la propriété existe dans la classe
                            if ($reflectionClass->hasProperty($key)) {
                                $property = $reflectionClass->getProperty($key);
                                $property->setAccessible(true); // Autoriser l'accès aux propriétés privées
                                $property->setValue($newObject, $value); // Définir la valeur de la propriété
                            }
                        }
                        $objects[] = $newObject;
                    }
                }
            } else {
                echo "Erreur lors de l'exécution de la requête : " . $this->conn->error;
            }
        
            $this->conn->close(); // Fermez la connexion à la base de données
        
            return $objects;
        }
        
        
        public function selectObject($object) {
            $className = get_class($object);
            $reflectionClass = new ReflectionClass($className);
            $properties = $reflectionClass->getProperties();
            $propertyNames = [];
            $propertyValues = [];
        
            foreach ($properties as $property) {
                $propertyName = $property->getName();
                $propertyValue = $property->getValue($object);
                if ($propertyValue !== null) {
                    $propertyNames[] = $propertyName;
                    $propertyValues[] = $propertyValue;
                }
            }
        
            $sql = "SELECT * FROM $className WHERE ";
            $conditions = [];
        
            foreach ($propertyNames as $propertyName) {
                $conditions[] = "$propertyName = ?";
            }
        
            $sql .= implode(' AND ', $conditions);
        
            $this->conn = $this->getConnection();
        
            $stmt = $this->conn->prepare($sql);
        
            if ($stmt) {
                $types = str_repeat('s', count($propertyValues));
        
                // Créez un tableau de références pour les valeurs
                $refs = array();
                foreach($propertyValues as $key => $value) {
                    $refs[$key] = &$propertyValues[$key];
                }
        
                // Ajoutez le type à la première position du tableau
                array_unshift($propertyValues, $types);
        
                // Effectuez la liaison des valeurs
                call_user_func_array(array($stmt, 'bind_param'), $propertyValues);
        
                $stmt->execute();
        
                $result = $stmt->get_result();
        
                $objects = [];
        
                while ($row = $result->fetch_assoc()) {
                    $newObject = new $className();
                    foreach ($row as $key => $value) {
                        if ($reflectionClass->hasProperty($key)) {
                            $property = $reflectionClass->getProperty($key);
                            $property->setAccessible(true);
                            $property->setValue($newObject, $value);
                        }
                    }
                    $objects[] = $newObject;
                }
        
                $stmt->close();
                $this->conn->close();
        
                return $objects;
            } else {
                echo "Erreur de préparation de la requête: " . $this->conn->error;
                return [];
            }
        }
        
        








        public function updateSql($sql) 
        {
            $this->conn = $this->getConnection();

            if ($this->conn->query($sql) === TRUE) {
                
            } else {
                echo "Erreur lors de la mise à jour: " . $this->conn->error;
            }

            $this->conn->close();
        }















        public function update($objectRef, $object) {
            // Récupération des propriétés et des valeurs de l'objet de référence
            $propertiesRef = (new ReflectionClass(get_class($objectRef)))->getProperties();
            $propertyNamesRef = [];
            $propertyValuesRef = [];
        
            foreach ($propertiesRef as $propertyRef) {
                $propertyNameRef = $propertyRef->getName();
                $propertyValueRef = $propertyRef->getValue($objectRef);
                if ($propertyValueRef !== null) {
                    $propertyNamesRef[] = $propertyNameRef;
                    $propertyValuesRef[] = $propertyValueRef;
                }
            }
        
            // Récupération des propriétés et des valeurs de l'objet
            $properties = (new ReflectionClass(get_class($object)))->getProperties();
            $propertyNames = [];
            $propertyValues = [];
        
            foreach ($properties as $property) {
                $propertyName = $property->getName();
                $propertyValue = $property->getValue($object);
                if ($propertyValue !== null) {
                    $propertyNames[] = $propertyName;
                    $propertyValues[] = $propertyValue;
                }
            }
        
            // Création de la requête SQL
            $sql = "UPDATE " . get_class($object) . " SET ";
            $sql .= implode("=?, ", $propertyNames) . "=? ";
            $sql .= "WHERE " . implode("=? AND ", $propertyNamesRef) . "=?";
        
            // Préparation et exécution de la requête
            $this->conn = $this->getConnection();
            $stmt = $this->conn->prepare($sql);
        
            if ($stmt) {
                // Fusion des tableaux de valeurs
                $values = array_merge($propertyValues, $propertyValuesRef);
        
                // Création du type de paramètres pour la liaison
                $types = str_repeat('s', count($values));
        
                // Liaison des valeurs aux paramètres de la requête préparée
                $stmt->bind_param($types, ...$values);
        
                // Exécution de la requête
                $stmt->execute();
        
                // Fermeture de la connexion
                $this->conn->close();
            } else {
                echo "Erreur de préparation de la requête: " . $this->conn->error;
            }
        }
        
        
        









        
        public function deleteSql($sql) {
            $this->conn = $this->getConnection();
        
            if ($this->conn->query($sql) === TRUE) {
                
            } else {
                echo "Erreur lors de la suppression: " . $this->conn->error;
            }
        
            $this->conn->close();
        }
        













        public function delete($object) {
            $className = get_class($object);
            $reflectionClass = new ReflectionClass($className);
            $properties = $reflectionClass->getProperties();
            $propertyNames = [];
            $propertyValues = [];
        
            foreach ($properties as $property) {
                $propertyName = $property->getName();
                $propertyValue = $property->getValue($object);
                if ($propertyValue !== null) {
                    $propertyNames[] = $propertyName;
                    $propertyValues[] = $propertyValue;
                }
            }
        
            $sql = "DELETE FROM $className WHERE ";
        
            $conditions = [];
        
            foreach ($propertyNames as $propertyName) {
                $conditions[] = "$propertyName = ?";
            }
        
            $sql .= implode(' AND ', $conditions);
        
            $this->conn = $this->getConnection();
        
            $stmt = $this->conn->prepare($sql);
        
            if ($stmt) {
                $types = str_repeat('s', count($propertyValues));
        
                // Créez un tableau de références pour les valeurs
                $refs = array();
                foreach($propertyValues as $key => $value) {
                    $refs[$key] = &$propertyValues[$key];
                }
        
                // Ajoutez le type à la première position du tableau
                array_unshift($propertyValues, $types);
        
                // Effectuez la liaison des valeurs
                call_user_func_array(array($stmt, 'bind_param'), $propertyValues);
        
                $stmt->execute();
                $stmt->close();
                $this->conn->close();
            } else {
                echo "Erreur lors de la préparation de la requête: " . $this->conn->error;
            }
        }
        
        
        


    }
    
    

?>