@echo off
set docker_php_name=mytest_phpapache
FOR /f "tokens=*" %%i IN ('docker ps -aq') DO docker stop %%i
docker-compose up -d --build
docker exec -it %docker_php_name% bash