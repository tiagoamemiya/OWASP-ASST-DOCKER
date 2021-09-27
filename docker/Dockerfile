FROM php:7.2-apache

RUN apt-get update -y && apt-get upgrade -y 

RUN curl -sL https://deb.nodesource.com/setup_14.x | bash
RUN apt-get install --yes nodejs

WORKDIR /app

EXPOSE 80