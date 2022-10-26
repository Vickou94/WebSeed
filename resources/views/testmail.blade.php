<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Votre Commande</title>
</head>

<body>
    <h1>Merci pour votre commande !</h1>
    <p>Numéro de commande: {{ $mailData['order'] }}</p>
    <p>Adresse de livraison: {{ $mailData['address'] }}</p>
    <p>Ville: {{ $mailData['city'] }}</p>
    <p>Code postal: {{ $mailData['zipcode'] }}</p>
    <p>Nom/Prénom: {{ $mailData['name'] }}</p>
    <p>Montant total: {{ $mailData['amount'] }}</p>
</body>

</html>