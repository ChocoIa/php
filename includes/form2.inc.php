<h1 class="text-center">Ajouter plus de données</h1>
<form  action="index.php" method="POST" enctype="multipart/form-data">
<div class="row">
<div class="card col-md-7 mx-auto my-1">
<div class="form-group">
        <div class="form-floating mb-3">
          <input type="Prénom" class="form-control" name="prénom" id="Form-Prénom" placeholder="Prénom" required>
          <label for="floatingPrénom">Prénom</label>
        </div>
    
        <div class="form-floating">
          <input type="Nom" class="form-control"name="nom" id="Form-Nom" placeholder="Nom" required>
          <label for="floatingNom">Nom</label>
        </div>
      </div>
    
        <div class="form-group">
        <label for="Age" class="form-label mt-4">Age (18 à 70 ans) </label>
            <input type="number" min="18" max="70" class="form-control" name="age" id="form-age" placeholder="Renseignez votre age" required>
        </div>
    
        <div class="form-group">
            <div class="input-group mb-3 mt-4">
                <span class="input-group-text">Taille (1,26m à 3m)</span>
                <input type="number" min="1.26" max="3" step="0.01" class="form-control" name="taille" id="form-taille" placeholder="1.7" required>
                 <span class="input-group-text">m</span>
            </div>
         </div>
         <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="sex" id="sex-Femme" value="Femme" required>
              Femme
            </label>
         </div>
         <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="sex" id="sex-Homme" value="Homme" required>
              Homme
            </label>
         </div>
</div> 
<div class="card col-md-4 mx-auto my-1">
<header class="text-start">Connaissances</header>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="HTML" name="html" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    HTML
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="CSS" name="css" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    CSS
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="JavaScript" name="javascript" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    JavaScript
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="PHP" name="php" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    PHP
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="MySQL" name="mysql" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    MySQL
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Bootstrap" name="bootstrap" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Bootstrap
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Symfony" name="symfony" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Symfony
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="React" name="react" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    React
                </label>
            </div>
            <label for="colorpicker">Couleur préférée:</label>
            <input type="color" id="color" name="color" value="#0000ff">

            <label for="birthday">Date de naissance</label>
            <input type="date" id="birthday" name="birthday">
            
</div>

<div class="card col-11 mx-auto my-1">
    <div class="form-group">
      <label for="formFile" class="form-label mt-4"><p>joindre une image(jpg ou png)</p></label>
      <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
      <input class="form-control" type="file" name="image" id="image">
    </div>
</div>
<div class="d-flex flex-row-reverse bd-highlight mt-4">
         <button type="submit" name="save" class="btn btn-primary">Enregistrer les données</button>
        </div>
</form>        