# rekrutacja2

1. Wypisz polecenia, których użyjesz, aby:
   1. zainicjować repozytorium dla nowego projektu
      - `git init` inicjalizuje nowe repozytorium
      - `git clone` pozwala rozpocząć pracę z istniejącym repozytorium, dużo częściej używana opcja, repozytoria tworzy się raczej w usłudze np. github/gitlab a potem się je klonuje, git init jest wtedy odpalany po stronie serwera w momencie tworzenia nowego projektu/repozytorium
   2. dodać i wypchnąć nowo dodane pliki
      - `git add .` dodaje wszystkie zmienione pliki do trackowanych plików gita
      - `git commit` zapisuje stan plików w postaci commita
      - `git push` wysyła commity na serwer
   3. pobrać i połączyć zmiany z repozytorium
      - `git fetch` pobiera z serwera listę commitów na każdym branchu, ale nie zmienia stanu istniejących branchy.
      - `git pull` pobiera z serwera commity brakujące na obecnym branchu lub jeżeli podamy nazwę brancha, pobiera commity z tamtego brancha. W zależności od ustawienia gita może połączyć commity rebasem, mergem albo fast forwardem.
      - `git cherrypick` pozwala pobrać i wstrzyknąć jeden wybrany commit do naszego brancha

2. Napisz kod obsługujący REST API używając Symfony i zawierający 3 dowolne endpointy

3. Przygotuj testy automatyczne dla powyższego kodu

4. Przygotuj pliki zawierające konfigurację dla nowego projektu w dockerze. W pliku powinny być uwzględnione takie usługi jak:
        a. serwer www
        b. baza danych
        c. właściwa aplikacja PHP
        d. obsługa cyklicznych zadań
