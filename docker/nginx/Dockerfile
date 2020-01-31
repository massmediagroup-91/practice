FROM nginx:alpine
RUN apk update && apk add --update --no-cache \
    sudo \
    bash

ADD ./docker/nginx/default.conf /etc/nginx/conf.d/default.conf
WORKDIR "/app"
