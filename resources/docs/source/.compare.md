---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#general


<!-- START_f5cfce2858b1e5067c374982b22d2582 -->
## api/participants/{id}
> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/participants/omnis" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/participants/omnis"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/participants/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The ID of the participant.

<!-- END_f5cfce2858b1e5067c374982b22d2582 -->

<!-- START_9f9154c9bd24ed706e1c947fec4cbd07 -->
## api/participants/{id}
> Example request:

```bash
curl -X PUT \
    "http://localhost/api/participants/et" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"example@example.com","firstName":"john","lastName":"doe"}'

```

```javascript
const url = new URL(
    "http://localhost/api/participants/et"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "example@example.com",
    "firstName": "john",
    "lastName": "doe"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/participants/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The ID of the activity.
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `email` | string |  required  | The email of the participant.
        `firstName` | string |  required  | The first name of the participant.
        `lastName` | string |  required  | The last name of the participant.
    
<!-- END_9f9154c9bd24ed706e1c947fec4cbd07 -->

<!-- START_1c1811d37ce537f076d8a15c890dbf29 -->
## api/activities/{activityId}/participants
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/activities/1/participants" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/activities/1/participants"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "status": 401,
    "details": {
        "message": "Unauthorized"
    }
}
```

### HTTP Request
`GET api/activities/{activityId}/participants`


<!-- END_1c1811d37ce537f076d8a15c890dbf29 -->

<!-- START_35b6622db83973ddb0cb4519f77eb5ab -->
## api/activities/{activityId}/participants
> Example request:

```bash
curl -X POST \
    "http://localhost/api/activities/1/participants" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"example@example.com","firstName":"john","lastName":"doe"}'

```

```javascript
const url = new URL(
    "http://localhost/api/activities/1/participants"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "example@example.com",
    "firstName": "john",
    "lastName": "doe"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/activities/{activityId}/participants`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The ID of the activity.
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `email` | string |  required  | The email of the participant.
        `firstName` | string |  required  | The first name of the participant.
        `lastName` | string |  required  | The last name of the participant.
    
<!-- END_35b6622db83973ddb0cb4519f77eb5ab -->


