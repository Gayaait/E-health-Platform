<?php

define("URL", str_replace("index.php","",(isset($_SERVER['HTTPS'])? "https" : "http").
"://".$_SERVER['HTTP_HOST'].$_SERVER["PHP_SELF"]));

function getPraticiens(){
    $conn = mysqli_connect('localhost','root','','user_db');
    $select =  " SELECT * FROM practitioner_db";
    $result = mysqli_query($conn, $select);
    $list_json = [];
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            $id_pract = $row["id_pract"];
            $prenom = $row["name"];
            $nom = $row["surname"];
            $qualifications = $row["qualifications"];
            $telecom = $row["telecom"];
            $address = $row["address"];
            $address = explode(",", $address);
            $gender = $row["gender"];
            $communication = $row["communication"];
            $mail = $row["mail"];
            $tel = $row["tel"];
            $pract_data = array(
              'resourceType' => 'Practitioner',
              'id' => $id_pract,
              'name' => array(
                  array(
                      'family' => $nom,
                      'given' => array($prenom)
                  )
              ),
              'address' => array(
                  array(
                      'line' => array($address[0]),
                      'city' => $address[2],
                      'postalCode' => $address[1],
                  )
              ),
              'qualification' => array(
                  array(
                      'code' => array(
                          'coding' => array(
                              array(
                                  'system' => 'http',
                                  'code' => 'MD',
                                  'display' => $qualifications
                              )
                          )
                      )
                  )
              ),
              'telecom' => array(
                  array(
                      'system' => 'phone',
                      'value' => $telecom
                  ),
                  array(
                      'system' => 'email',
                      'value' => $mail
                  )
              ),
              'gender' => $gender,
              'communication' => array(
                array(
                    'language' => array(
                        'coding' => array(
                            array(
                                'system' => 'http://hl7.org/fhir/ValueSet/languages',
                                'code' => $communication,
                            )
                        )
                    )
                )
            )
            );
            $list_json[] = $pract_data;
        }
      }
      header("Content-Type: application/json");
      echo json_encode($list_json, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
    // file_put_contents('pract.json', json_encode($texte_pract, JSON_PRETTY_PRINT));
}

function getPatientsByPraticienId($id){
    $conn = mysqli_connect('localhost','root','','user_db');
    $select =  " SELECT * FROM user_form WHERE id_pract = $id ";
    $result = mysqli_query($conn, $select);
    $list_json = [];
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
          $id_patient = $row["id_patient"];
          $id_pract = $row["id_pract"];
          $nom = $row["nom"];
          $prenom = $row["prenom"];
          $gender = $row["gender"];
          $birth = $row["birth"];
          $tel = $row["tel"];
          $mail = $row["mail"];

          $patient_data = array(
            'resourceType' => 'Patient',
            'id' => $id_patient,
            'name' => array(
                array(
                    'family' => $nom,
                    'given' => array($prenom)
                )
            ),
            'telecom' => array(
                array(
                    'system' => 'phone',
                    'value' => $tel
                ),
                array(
                    'system' => 'email',
                    'value' => $mail
                )
            ),
            'gender' => $gender,
            'birthDate' => $birth,
          );
          $list_json[] = $patient_data;
        }
      }
      header("Content-Type: application/json");
      echo json_encode($list_json, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
}

function getPatients(){
  $conn = mysqli_connect('localhost','root','','user_db');
  $select =  " SELECT * FROM user_form ";
  $result = mysqli_query($conn, $select);
  $list_json = [];
  if($result->num_rows>0){
      while($row=$result->fetch_assoc()){
        $id_patient = $row["id_patient"];
        $nom = $row["nom"];
        $prenom = $row["prenom"];
        $gender = $row["gender"];
        $birth = $row["birth"];
        $tel = $row["tel"];
        $mail = $row["mail"];

        $patient_data = array(
          'resourceType' => 'Patient',
          'id' => $id_patient,
          'name' => array(
              array(
                  'family' => $nom,
                  'given' => array($prenom)
              )
          ),
          'telecom' => array(
              array(
                  'system' => 'phone',
                  'value' => $tel
              ),
              array(
                  'system' => 'email',
                  'value' => $mail
              )
          ),
          'gender' => $gender,
          'birthDate' => $birth,
        );
        $list_json[] = $patient_data;
      }
    }
    header("Content-Type: application/json");
    echo json_encode($list_json, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
}


function getImmunisationById($id){
  $conn = mysqli_connect('localhost','root','','user_db');
  $select =  " SELECT * FROM immunisation_db WHERE id_patient = $id ";
  $result = mysqli_query($conn, $select);
  $list_json = [];
  if($result->num_rows>0){
      while($row=$result->fetch_assoc()){
        $id_vaccin = $row["id_vaccin"]; 
        $id_patient = $row["id_patient"]; 
        $vaccineCode = $row["vaccineCode"]; 
        $administeredProduct = $row["administeredProduct"]; 
        $lotNumber = $row["lotNumber"];
        $expirationDate = $row["expirationDate"]; 
        $site = $row["site"];
        $doseQuantity = $row["doseQuantity"];
        $date = $row["date"];

        $immunization_data = array(
          'resourceType' => 'Immunization',
          'id' => $id_vaccin,
          'status' => 'completed',
          'vaccineCode' => array(
            'coding' => array(
              array(
                'system' => 'urn:oid:1.2.36.1.2001.1005.17',
                'code' => $vaccineCode,
                'display' => $administeredProduct
              )
            )
          ),
          'patient' => array(
            'reference' => $id_patient
          ),
          'occurrenceDateTime' => $date,
          'location' => array(
            'reference' => 'Location/54321'
          ),
          'lotNumber' => $lotNumber,
          'expirationDate' => $expirationDate,
          'site' => array(
            'coding' => array(
              array(
                'system' => 'http://terminology.hl7.org/CodeSystem/v3-ActSite',
                'display' => $site
              )
            )
          ),
          'doseQuantity' => array(
            'value' => $doseQuantity,
            'unit' => 'mg'
          )
        );
        $list_json[] = $immunization_data;
      }
    }
    header("Content-Type: application/json");
    echo json_encode($list_json, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
}

function getObservationById($id){
  $conn = mysqli_connect('localhost','root','','user_db');
  $select =  " SELECT * FROM observations_db WHERE id_patient = $id ";
  $result = mysqli_query($conn, $select);
  $list_json = [];
  if($result->num_rows>0){
      while($row=$result->fetch_assoc()){ 
        $id_observations = $row["id_observations"];
        $id_patient = $row["id_patient"]; 
        $observation = $row["observation"]; 
        $value = $row["value"]; 
        $date_observation = $row["date_observation"];
        $unit = $row["unit"];

        $data_obs = array(
          'resourceType' => 'Observation',
          'id' => $id_observations,
          'status' => 'final',
          'code' => array(
            'coding' => array(
              array(
                'system' => 'http://loinc.org',
                'display' => $observation
              )
            )
          ),
          'subject' => array(
            'reference' => $id_patient,
          ),
          'effectiveDateTime' => $date_observation,
          'valueQuantity' => array(
            'value' => $value,
            'unit' => $unit,
            'system' => 'http://unitsofmeasure.org',
          ),
        );
        
        $list_json[] = $data_obs;
      }
    }
    header("Content-Type: application/json");
    echo json_encode($list_json, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
}

function getPatientById($id){
  $conn = mysqli_connect('localhost','root','','user_db');
  $select =  " SELECT * FROM user_form where id_patient=$id ";
  $result = mysqli_query($conn, $select);
  $list_json = [];
  if($result->num_rows>0){
      while($row=$result->fetch_assoc()){
        $id_patient = $row["id_patient"];
        $nom = $row["nom"];
        $prenom = $row["prenom"];
        $gender = $row["gender"];
        $birth = $row["birth"];
        $tel = $row["tel"];
        $mail = $row["mail"];

        $patient_data = array(
          'resourceType' => 'Patient',
          'id' => $id_patient,
          'name' => array(
              array(
                  'family' => $nom,
                  'given' => array($prenom)
              )
          ),
          'telecom' => array(
              array(
                  'system' => 'phone',
                  'value' => $tel
              ),
              array(
                  'system' => 'email',
                  'value' => $mail
              )
          ),
          'gender' => $gender,
          'birthDate' => $birth,
        );
        $list_json[] = $patient_data;
      }
    }
    header("Content-Type: application/json");
    echo json_encode($list_json, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
}

?>