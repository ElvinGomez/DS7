## Instalación

- docker-compose up

- docker network create myNetwork

- docker network connect myNetwork docker_mysql_1

- docker network inspect myNetwork

```bash
"be56ffcec6e23d2501c1cf7528a39fa4cd48749254117a5a3658fa80e06a6485": {
  "Name": "docker_mysql_1",
  "EndpointID": "83d26825882dd15ef477f2b03b9579b8c74ac267b9fb9955767690e6d7b3eb12",
  "MacAddress": "02:42:ac:13:00:03",
  "IPv4Address": "172.19.0.3/16", <======== Esto de aquí sin el /16
  "IPv6Address": ""
}
```
