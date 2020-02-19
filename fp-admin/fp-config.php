<?php
/*
    Poniżej znajdują się dane wymagane do połącznia z bazą danych MySQL.
*/
$host = 'localhost'; /** Nazwa lub adres hosta z serwerem bazy danych mysql */
$username = 'root'; /** Użytkownik bazy danych z uprawnieniami do tworzenia baz danych oraz do wykonywania zapytań na bazie danych. */
$password = ''; /** Hasło użytkownika bazy danych.*/
$dbname = 'frosty_panel'; /** Nazwa bazy danych która zostanie utworzona a pózniej będzie z niej korzystał system. */
$charset = ''; /** Zestaw znaków użyty do stworzenia tabeli w bazie danych (np. utf-8) */
$collate = ''; /** Zestawienie znaków użyte do stworzenia tabeli w bazie danych (np. utf8_polish_ci)*/
/*
    Baza danych:
*/
define('t_prefix', 'fp_'); /** Ustawia prefiks w nazwie utworzonej tabeli */
?>