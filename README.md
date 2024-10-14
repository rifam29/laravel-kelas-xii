# Bahan materi kelas XII
Langkah-langkah yang harus dilakukan:

1. Silahkan kalian fork untuk memasukan kedalam repository kalian masing-masing
2. Setelah di fork silahkan kalian lakukan cloning dari repo hasil fork
```bash
git clone nama-repo-masing-masing
cd dataweb
```
3. Membuat file .env
```bash
cp .env.example .env
nano .env
```
4. Atur koneksi database (pastikan databasenya sudah di buat terlebih dahulu)
```bash
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_name
DB_USERNAME=db_user
DB_PASSWORD=db_pass
```
5. Install dependncies
```bash
composer install
```
6. Generate APP Key
```bash
php artisan key:generate
```
7. Migration & Seeder
```bash
php artisan migrate -s
```
8. copy folder image yang ada pada folder public ke dalam folder storage/app
9. Buat symlink untuk storage
```bash
php artisan storage:link
```  
