<?php
        class personne
        {
                private $ID;
                private $NOM;
                private $PRENOM;
                private $PHOTO;
                private $SEX;
                private $TELEPHONE;
                private $ADRESSE;
                private $DATE_NAISSANCE;
                private $LIEU_NAISSANCE;




                /**
                 * Get the value of ID
                 */
                public function getID()
                {
                        return $this->ID;
                }

                /**
                 * Get the value of nom
                 */
                public function getNOM()
                {
                        return $this->NOM;
                }

                /**
                 * Set the value of nom
                 *
                 * @return  self
                 */
                public function setNOM($NOM)
                {
                        $this->NOM = $NOM;

                        return $this;
                }

                /**
                 * Get the value of prenom
                 */
                public function getPRENOM()
                {
                        return $this->PRENOM;
                }

                /**
                 * Set the value of prenom
                 *
                 * @return  self
                 */
                public function setPRENOM($PRENOM)
                {
                        $this->PRENOM = $PRENOM;

                        return $this;
                }

                /**
                 * Get the value of PHOTO
                 */
                public function getPHOTO()
                {
                        return $this->PHOTO;
                }

                /**
                 * Set the value of PHOTO
                 *
                 * @return  self
                 */
                public function setPHOTO($PHOTO)
                {
                        $this->PHOTO = $PHOTO;

                        return $this;
                }

                /**
                 * Get the value of SEX
                 */
                public function getSEX()
                {
                        return $this->SEX;
                }

                /**
                 * Set the value of SEX
                 *
                 * @return  self
                 */
                public function setSEX($SEX)
                {
                        $this->SEX = $SEX;

                        return $this;
                }

                /**
                 * Get the value of TELEPHONE
                 */
                public function getTELEPHONE()
                {
                        return $this->TELEPHONE;
                }

                /**
                 * Set the value of TELEPHONE
                 *
                 * @return  self
                 */
                public function setTELEPHONE($TELEPHONE)
                {
                        $this->TELEPHONE = $TELEPHONE;

                        return $this;
                }

                /**
                 * Get the value of ADRESSE
                 */
                public function getADRESSE()
                {
                        return $this->ADRESSE;
                }

                /**
                 * Set the value of ADRESSE
                 *
                 * @return  self
                 */
                public function setADRESSE($ADRESSE)
                {
                        $this->ADRESSE = $ADRESSE;

                        return $this;
                }

                /**
                 * Get the value of DATE_NAISSANCE
                 */
                public function getDATE_NAISSANCE()
                {
                        return $this->DATE_NAISSANCE;
                }

                /**
                 * Set the value of DATE_NAISSANCE
                 *
                 * @return  self
                 */
                public function setDATE_NAISSANCE($DATE_NAISSANCE)
                {
                        $this->DATE_NAISSANCE = $DATE_NAISSANCE;

                        return $this;
                }

                /**
                 * Get the value of LIEU_NAISSANCE
                 */
                public function getLIEU_NAISSANCE()
                {
                        return $this->LIEU_NAISSANCE;
                }

                /**
                 * Set the value of LIEU_NAISSANCE
                 *
                 * @return  self
                 */
                public function setLIEU_NAISSANCE($LIEU_NAISSANCE)
                {
                        $this->LIEU_NAISSANCE = $LIEU_NAISSANCE;

                        return $this;
                }

                public static function afficherTous()
                {
                        $req = MonPdo::getInstance()->prepare("select * from personne");
                        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'personne');
                        $req->execute();
                        $lesResultats = $req->fetchAll();
                        return $lesResultats;
                }
        }
        ?>