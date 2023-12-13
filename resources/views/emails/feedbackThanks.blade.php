<div>
    <h2>Kiitos, palautteesi on vastaanotettu.</h2>
    <h3>{{ $feedbackData['title'] }}</h3>
    <h4>Palautteesi:</h4>
    <p>{{ $feedbackData['feedback'] }}</p>
    <h3>Lähettäjän tiedot</h3>
    <p><b>Nimi:</b> {{ $feedbackData['name'] }}</p>
    <p><b>Sähköposti:</b> {{ $feedbackData['email'] }}</p>
</div>