<h5>Do prawidłowego działania projektu:</h5>

1.Utworzyć bazę - domyślnie jest to <b>steam</b>
2.Zapuścić migracje
3. W .env prowadzić klucz SteamAPI - można skorzystać z mojego :)

<p>
    Aplikacja przy logowaniu poprzez serwis Steam sprawdza, czy użytkownik posiada już konto
    w bazie. Jeśli nie - jest ono tworzone i domyślnie ustawiane jest 0 zebranych punktów.
    Następne w zakładce <i>Moje Konto</i> pobieranę są informacje z bazy na podstawie zalogowanego użytkownika.
</p>
<h5>API</h5>
<p>
    <b>/api/user/id</b> - gdzie <i>id</i> to ID użytkownika z bazy lub SteamID. Zwracany jest JSON z danymi użytkownika
    z bazy danych.
</p>
