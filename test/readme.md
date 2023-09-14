## Design Patterns Hands-on

### Para executar os testes do projeto:

#### 1 - docker build -t design-patterns .
#### 2 - docker run -d --name design-patterns --mount type=bind,source=,target=/app design-patterns
#### 3 - docker exec -it design-patterns bash
#### 4 - composer install/update
#### 5 - composer run test
