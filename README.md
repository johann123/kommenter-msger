# Kommenter msg faker with Elastic

for my Mitze <3 and also mayb für Döme

## install

`composer install --ignore-platform-reqs`
`docker compose up`

A php container az elastic és a rabbitmq felállása után indul. Indulás után lefut egy, a queue-ba 100 posztot
push-oló script, majd leáll.

## indítás után elérhetőek

[RabbitMQ admin](http://localhost:15672)
[ElasticSearch API](http://localhost:9200)
