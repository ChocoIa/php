<?php session_start(); 
if(isset($_SESSION['table'])) $table = $_SESSION['table'];
function readTable(){
    $table = $_SESSION['table'];
    $O = 0;
    foreach ($table as $x => $v) {
        echo 'à la ligne n°' . $O . ' correspond la clé "' . $x . '" et contient "' . $v . '"</br>';
        $O++;
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
                        $table = array(          
                            "first_name" => $prenom,
                            "last_name"  =>  $nom,
                            "age" => $age,
                            "size" => $taille,
                            "civility" => $sex,
                        );
                        $_SESSION['table'] = $table;
                        echo '<p class="alert-success text-center py-3"> Données sauvegardées</p>';
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
                                    echo 'à la ligne n°' . $O . ' correspond la clé "' . $x . '" et contient "' . $v . '"</br>';
                                    $O++;
                                }
                            }
                            else if (isset($_GET['function'])){     

                                echo '<h2 class="text-center">Fonction</h2>';
                                echo '<h3 class="mt-5 fs-6">===> J\'utilise ma fonction readTable()</h3>';
                                readTable();
                            }  
                            elseif (isset($_GET['del'])) {
                                unset ($_SESSION['table']);
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