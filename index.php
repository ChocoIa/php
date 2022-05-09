<?php session_start(); 
if(isset($_SESSION['table'])) $table = $_SESSION['table'];
function readTable(){
    $table = $_SESSION['table'];
    $O = 0;
    foreach ($table as $x => $v) {
        if ($x == 'img') {
            unset($v);
            echo '<div>à la ligne n°' . $O . ' correspond la clé "' . $x . '" et contient</div>';
            echo "<img class='w-100' src='./uploaded/".$table['img']['name']."'>"; 
        }
        else { echo 'à la ligne n°' . $O . ' correspond la clé "' . $x . '" et contient "' . $v . '"</br>';
        $O++;
    }
    }
}  
function getCiv($civility){
    $civ = ($civility == "Homme") ? "Mr" :  "Mme";
    return $civ;
}
?>

<!DOCTYPE html>
<html lang="fr">

    <?php  include 'includes/head.inc.html';  ?>
<body>
     <?php include 'includes/header.inc.html';  ?>
     

     <div class="container">
        <div class="row">

            <nav class="col-md-3 mt-3">

            <a class="btn btn-outline-secondary w-100" role="button" href="index.php">Home</a>
            <?php if (isset($table)) include_once './includes/ul.inc.php'; ?>    
            </nav>
           
            <section class="col-md-9 mt-3">

            <?php if(isset($_GET['add'])) {
                        include './includes/form.inc.html';
                    } 
                    elseif(isset($_GET['addmore'])) {
                        include './includes/form2.inc.php';
                    } 

                    elseif(isset($_POST['save'])) {
                        $prenom = $_POST['prénom'];
                        $nom = $_POST['nom'];
                        $age = $_POST['age'];
                        $taille = $_POST['taille'];
                        $sex = $_POST['sex'];
                        $html = $_POST['html'];
                        $css = $_POST['css'];
                        $js = $_POST['javascript'];
                        $php = $_POST['php'];
                        $mysql = $_POST['mysql'];
                        $bootstrap = $_POST['bootstrap'];
                        $symfony = $_POST['symfony'];
                        $react = $_POST['react'];
                        $color = $_POST['color'];
                        $date = $_POST['birthday'];
                        $fileName=$_FILES['image']['name'];
                        $fileTmpName=$_FILES['image']['tmp_name'];
                        $fileSize=$_FILES['image']['size'];
                        $fileError=$_FILES['image']['error'];
                        $fileType=$_FILES['image']['type'];
                        $extensions = ['jpg', 'png', 'jpeg', 'gif'];
                        $tableComp= array(          
                            "first_name" => $prenom,
                            "last_name"  =>  $nom,
                            "age" => $age,
                            "size" => $taille,
                            "civility" => $sex,
                            "html" => $html,
                            "css" => $css,
                            "javascript" => $js,
                            "php" => $php,
                            "mysql" => $mysql,
                            "bootstrap" => $bootstrap,
                            "symfony" => $symfony,
                            "react" => $react,
                            "color" => $color,
                            "birthday" => $date,
                            "img" => $img = array (
                                "name" => $fileName,
                                "tmp_name" => $fileTmpName,
                                "size" => $fileSize,
                                "error" => $fileError,
                                "type" => $fileType
                            )
                        );
                        $table = array_filter($tableComp);
                        $_SESSION['table'] = $table;
                        if (empty($_FILES['image'])) {
                            unset ($_SESSION['table']['img']);
                            echo '<p class="alert-success text-center py-3"> Données sauvegardées</p>';
                    } 
                    else {
                        move_uploaded_file($fileTmpName, './uploaded/' . $fileName);
                        $tabExtension = explode('.', $fileName);
                        $extension = strtolower(end($tabExtension));
                        $extensionsAutorisees = ['jpg', 'png', 'jpeg'];

                        if ( $fileError == 4) {
                            echo '<p class="alert-danger text-center pb-3 pt-4">Aucun fichier n\'a été téléchargé</p>';
                            unset($_SESSION['table']);
                        } elseif(in_array($extension,$extensionsAutorisees) === false) {
                            echo '<p class="alert-danger text-center pb-3 pt-4">Extension "' .$extension . '" non prise en charge';
                            unset($_SESSION['table']);
                        } elseif($fileError == 2) {
                            echo '<p class="alert-danger text-center pb-3 pt-4">La taille de l\'image doit être inférieure à 2Mo</p>';
                            unset($_SESSION['table']);
                        } elseif( $fileError == 1 ||  $fileError == 3 || $fileError > 4) {
                            echo '<p class="alert-danger text-center pb-3 pt-4">error: '. $fileError.'</p>';
                            unset($_SESSION['table']);
                        }elseif ( $fileError == 0) {
                            $table = array_filter($tableComp);
                            $_SESSION['table'] = $table;
                            echo '<p class="alert-success text-center py-3"> Données sauvegardées</p>';   
                        }
                    }
                }
                    
                
                    else {
                        if (isset($table)) {
                            if(isset($_GET['debugging'])) {
                                echo  '<h2 class="text-center">Débogage</h2>';
                                echo  '<h3 class="mt-5 fs-6">===> Lecture du tableau à l\'aide de la fonction print_r()</h3>';
                                print "<pre>";
                                print_r($table);
                                print "</pre>";
                            }
                            elseif(isset($_GET['concatenation'])) { 
                                echo '<h2 class="text-center">Concaténation</h2>';
                                echo '<h3 class="text-start mt-5 fs-6"> ===> Construction d\'une phrase avec le contenu du tableau </h3>';                               
                                $table['first_name'] = ucfirst ($table['first_name']);
                                $table['last_name'] = ucfirst  ($table['last_name']);
                                echo '<p>'. getCiv($civility) .' '. $table['first_name'] . ' ' . $table['last_name'] .'<br> j`ai '.  $table["age"] .' ans et je mesure '. $table['size'] . 'm. </p>' ;

                                echo "<h3 class='mt-5 fs-6'>===> Construction d'une phrase après MAJ du tableau :</h3>";                              
                                $table['first_name'] = ucfirst ($table['first_name']);
                                $table['last_name'] = strtoupper($table['last_name']);
                                echo '<p>' . getCiv($civility) . ' ' . $table['first_name'] . ' ' . $table['last_name'] . '<br> j`ai ' .  $table['age'] . ' ans et je mesure ' . $table['size'] . 'm. </p>';

                                echo "<h3 class='mt-5 fs-6'>===> Affichage d'une virgule à la place du point pour la taille </h3>";                              
                                $table['size'] = str_replace('.' , ',', $table['size']);
                                $table['first_name'] = ucfirst ($table['first_name']);
                                $table['last_name'] = strtoupper($table['last_name']);
                                echo '<p>' . getCiv($civility) . ' ' . $table['first_name'] . ' ' . $table['last_name'] . '<br> j`ai ' . $table['age'] . ' ans et je mesure ' . $table['size'] . 'm. </p>';

                            }
                            else if (isset($_GET['loop'])) {

                                echo '<h2 class="text-center">Boucle</h2>';
                                echo '<h3 class="mt-5 fs-6">===> Lecture du tableau à l\'aide d\'une boucle foreach</h3>';
                                $table = $_SESSION['table'];
                                $O = 0;
                                foreach ($table as $x => $v) {
                                    if ($x == 'img') {
                                        unset($v);
                                        echo '<div>à la ligne n°' . $O . ' correspond la clé "' . $x . '" et contient</div>';
                                        echo "<img class='w-100' src='./uploaded/".$table['img']['name']."'>"; 
                                    }
                                    else { echo 'à la ligne n°' . $O . ' correspond la clé "' . $x . '" et contient "' . $v . '"</br>';
                                    $O++;
                                }
                                }
                            }
                            else if (isset($_GET['function'])){     

                                echo '<h2 class="text-center">Fonction</h2>';
                                echo '<h3 class="mt-5 fs-6">===> J\'utilise ma fonction readTable()</h3>';
                                readTable();
                            }  
                            elseif (isset($_GET['del'])) {
                                unset ($_SESSION['table']);
                                $supprImg = "./uploaded/".$table['img']['name'];
                                unlink($supprImg);
                                if (empty($_SESSION['table'])) {
                                    echo '<p class="alert-success text-center py-3"> Données suprimées</p>';
                                }
                            
                            }else { 
                                echo '<a role="button" class=" btn btn-primary" href="index.php?add">Ajouter des données</a>'; 
                                echo '<a role="button" class=" btn btn-secondary" href="index.php?addmore">Ajouter plus de données</a>';
                            }  
                        }
                        else { 
                            echo '<a role="button" class=" btn btn-primary" href="index.php?add">Ajouter des données</a>';
                            echo '<a role="button" class=" btn btn-secondary" href="index.php?addmore">Ajouter plus de données</a>'; 
                        } 
                    }   
                
            ?>
            
            </section>
        
        </div>   
    </div>
         
         
         
    <?php include 'includes/footer.inc.html';  ?>

</body>
</html>