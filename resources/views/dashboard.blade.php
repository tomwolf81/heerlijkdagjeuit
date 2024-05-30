<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuw Dagje Uit Toevoegen</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
        }
        input, select, textarea {
            margin-bottom: 10px;
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .checkbox-group {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        .checkbox-group label {
            display: flex;
            align-items: center;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
        .error {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Nieuw Dagje Uit Toevoegen</h1>
        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('dagjeuit.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="titel">Titel</label>
                <input type="text" id="titel" name="titel" value="{{ old('titel') }}" placeholder="Titel" required>
            </div>
            <div>
                <label for="datum">Datum</label>
                <input type="date" id="datum" name="datum" value="{{ old('datum') }}" placeholder="Datum" required>
            </div>
            <div>
                <label for="beschrijving">Omschrijving</label>
                <textarea id="beschrijving" name="beschrijving" placeholder="Omschrijving" required>{{ old('beschrijving') }}</textarea>
            </div>
            <div>
                <label for="categorie_id">Categorie</label>
                <select id="categorie_id" name="categorie_id" required>
                    <option value="">Selecteer een categorie</option>
                    @foreach($categories as $categorie)
                        <option value="{{ $categorie->id }}" {{ old('categorie_id') == $categorie->id ? 'selected' : '' }}>{{ $categorie->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="checkbox-group">
                <label><input type="checkbox" name="buiten" {{ old('buiten') ? 'checked' : '' }}> Buiten</label>
                <label><input type="checkbox" name="minder_validen" {{ old('minder_validen') ? 'checked' : '' }}> Minder validen</label>
                <label><input type="checkbox" name="restaurant_aanwezig" {{ old('restaurant_aanwezig') ? 'checked' : '' }}> Restaurant aanwezig</label>
            </div>
            <div>
                <label for="foto">Foto</label>
                <input type="file" id="foto" name="foto" required>
            </div>
            <button type="submit">Toevoegen</button>
        </form>
    </div>
</body>
</html>
