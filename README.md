# APIWFL

## List Endpoint
#### Base url: http://localhost:8000/api

| HTTP Method | Endpoint        | Description         |
| ----------- | --------------- | ------------------- |
| GET         | /loker     | Read All   |
| GET         | /loker/{id} | Get Vacancy By ID | Vacancy Controller |
| POST        | /loker | Create New Vacancy| Vacancy Controller |
| PUT*        | /loker | Update Vacancy| Vacancy Controller |
| DELETE         | /loker/{id}     | Delete loker by ID   | Vacancy Controller |
| GET         | /post     | Read All   | Post Controller |
| GET         | /post/{id} | Get Post By ID | Post Controller |
| POST         | /register | Create New User | Register Controller |


```
example usage: http://localhost:8000/api/loker
run different route: php artisan serve --port=8000
```

*Masih ada yg harus diubah
