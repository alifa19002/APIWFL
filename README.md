# APIWFL

## List Endpoint
#### Base url: http://localhost:8000/api

| HTTP Method | Endpoint        | Description         | Location            | Status              |
| ----------- | --------------- | ------------------- | ------------------- | ------------------- |
| GET         | /loker     | Read All   | Vacancy Controller | checked   |
| GET         | /loker/{id} | Get Vacancy By ID | Vacancy Controller | checked   |
| POST        | /loker | Create New Vacancy| Vacancy Controller | checked   |
| PUT*        | /loker | Update Vacancy| Vacancy Controller | unchecked   |
| DELETE      | /loker/{id}     | Delete loker by ID   | Vacancy Controller | checked   |
| GET         | /post     | Read All   | Post Controller | unchecked   |
| GET         | /post/{id} | Get Post By ID | Post Controller | unchecked   |
| POST        | /post | Create New post| Post Controller | unchecked   |
| PUT         | /post | Update post| Post Controller | unavailable   |
| DELETE      | /post/{id}     | Delete post by ID   | Post Controller | unchecked   |
| POST        | /register | Create New User | Register Controller | unchecked   |
| GET         | /report/{id} | Create report | Report Controller | unchecked   |
| DELETE      | /report/{id}     | Delete report by ID   | Report Controller | unchecked   |
| POST        | /report | Create New Report| Report Controller | unchecked   |
| POST        | /login | Create token auth| Login Controller | unchecked   |
| POST        | /logout | Delete token auth| Login Controller | unchecked   |
| POST        | /company | Verify New Company | Company Controller | unchecked   |

```
example usage: http://localhost:8000/api/loker
run different route: php artisan serve --port=8000
```

*Masih ada yg harus diubah
