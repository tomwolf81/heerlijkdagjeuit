<!-- resources/views/dagjeuit/create.blade.php -->

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuw Dagjeuit Toevoegen</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f4f4f4;
        }
        
        form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
        }
        
        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        
        textarea {
            height: 150px;
        }
        
        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<form method="POST" action="{{ route('dagjeuit.store') }}" enctype="multipart/form-data">
    @csrf
    <h2>Nieuw Dagjeuit Toevoegen</h2>
    <div>
        <label for="titel">Titel:</label>
        <input type="text" id="titel" name="titel" required>
    </div>

    <div>
        <label for="beschrijving">Beschrijving:</label>
        <textarea id="beschrijving" name="beschrijving" required></textarea>
    </div>

    <input type="checkbox" id="buiten" name="buiten" value="1">
        <label for="buiten">Buiten</label>

        <input type="checkbox" id="restaurant_aanwezig" name="restaurant_aanwezig" value="1">
<label for="restaurant_aanwezig">Restaurant</label>
<input type="checkbox" id="minder_validen" name="minder_validen" value="1">
<label for="minder_validen">Minder validen</label>

<div>
    <label for="foto">Foto:</label>
    <input type="file" id="foto" name="foto">
</div>

<!-- Veld voor de categorie -->
<div>
    <label for="categories">Categorieën:</label><br>
    <input type="checkbox" id="sportief" name="naam[]" value="sportief">
    <label for="sportief">Sportief</label><br>
    <input type="checkbox" id="zwembad" name="naam[]" value="zwembad">
    <label for="zwembad">Zwembad</label><br>
    <input type="checkbox" id="pretpark" name="naam[]" value="pretpark">
    <label for="pretpark">Pretpark</label><br>
    <input type="checkbox" id="bezienswaardigheid" name="naam[]" value="bezienswaardigheid">
    <label for="bezienswaardigheid">Bezienswaardigheid</label><br>
    <input type="checkbox" id="culinair" name="naam[]" value="culinair">
    <label for="culinair">Culinair</label><br>
    <input type="checkbox" id="dierentuin" name="naam[]" value="dierentuin">
    <label for="dierentuin">Dierentuin</label><br>
</div>




    <button type="submit">Opslaan</button>
</form>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    
@endif



</body>
</html>
