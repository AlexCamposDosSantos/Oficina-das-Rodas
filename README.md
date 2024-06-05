# Sistema de Gerenciamento de Ordem de Serviço - Oficina das Rodas

## 1. Introdução

Este documento descreve o escopo e o plano para o desenvolvimento do Sistema de Gerenciamento de Ordem de Serviço, destinado a atender às necessidades da empresa "Oficina das Rodas". O sistema será uma aplicação web projetada para facilitar o controle e a gestão eficiente das ordens de serviço, desde a sua criação até a conclusão.

## 2. Objetivo

O objetivo principal do sistema é fornecer uma plataforma centralizada e eficiente para gerenciar todas as atividades relacionadas às ordens de serviço da oficina mecânica "Oficina das Rodas". O sistema visa simplificar e otimizar o processo de gerenciamento.

### Principais Objetivos:

- **Cadastro de Clientes e Veículos:** Facilitar o cadastro de clientes e veículos, permitindo uma gestão detalhada das informações e histórico de serviços.
- **Registro de Manutenções:** Registrar de forma precisa e organizada as manutenções realizadas em cada veículo, incluindo descrição dos serviços prestados.
- **Controle de Status:** Proporcionar um acompanhamento claro e transparente do status das ordens de serviço, permitindo identificar rapidamente quais veículos estão em manutenção, em espera ou aguardando peças.
- **Relatórios Detalhados:** Gerar relatórios detalhados sobre as atividades realizadas, incluindo um termo de garantia dos serviços prestados.

## 3. Requisitos do Cliente

- Gestão de Ordens de Serviço.
- Cadastro de Clientes e Veículos.
- Registro de Manutenções.
- Controle de Status das Ordens de Serviço.
- Relatórios e Termos de Garantia.

## 4. Escopo do Projeto

O escopo do projeto inclui:

- Desenvolvimento de um sistema web.
- Implementação de funcionalidades conforme os requisitos do cliente.
- Integração com um banco de dados para armazenamento.
- Testes de funcionalidade e usabilidade do sistema.

O escopo do projeto não inclui:

- Desenvolvimento de aplicativos móveis.
- Integração com sistemas externos de contabilidade ou gestão financeira.

### 4.1 Cadastro de Empresa e Usuários

- Implementação de um sistema para cadastrar a empresa solicitante do sistema, incluindo informações como CNPJ, razão social, endereço e contato.
- Desenvolvimento de um menu para cadastrar usuários, permitindo a definição de nome, e-mail, senha e permissões de acesso.

### 4.2 Cadastro de Clientes e Veículos

- Desenvolvimento de funcionalidade para cadastrar clientes, incluindo dados como nome, endereço, telefone, e-mail, entre outros.
- Possibilidade de cadastrar veículos para cada cliente, contendo informações como marca, modelo, renavam, ano e placa do veículo.

### 4.3 Abertura de Ordem de Serviço

- Implementação de uma tela para abrir ordens de serviço.
- Ao abrir uma nova ordem de serviço, deve ser selecionado cliente e veículo, campos para número da OS automático, data de abertura, status e responsável, descrição do problema e informações adicionais.

### 4.4 Registro de Manutenção

- Implementação de uma tela para registro de manutenção.
- Nessa tela deve ser possível visualizar informações da ordem de serviço selecionada, tal como cliente, veículo e descrição do problema, além de campo para registrar os serviços executados.

### 4.5 Controle de Status das Ordens de Serviço

- Desenvolvimento de uma tela para acompanhamento do progresso das ordens de serviço.
- Exibição de uma lista de ordens de serviço registradas, com informações resumidas como número da OS, data de abertura, cliente, status, veículo, modelo, mecânico responsável.
- Possibilidade de filtragem das ordens de serviço por status, cliente, mecânico e número da ordem de serviço.

### 4.6 Relatórios e Termos de Garantia

- Geração de relatórios de manutenção para cada ordem de serviço, contendo detalhes sobre os serviços prestados e as peças utilizadas.
- Inclusão de um termo de garantia padrão nos relatórios, especificando os termos e condições da garantia dos serviços.
- Para gerar o termo da ordem desejada, basta incluir o número da ordem de serviço.

## 5. Planejamento do Projeto

**Nome do sistema:** Oficina das Rodas  
**Líder da Equipe:** Sara Sacramento de Mello  

### Cronograma de Execução

1. Documento de Escopo e Planejamento - 03/04/2024
2. Estrutura básica do sistema com interface de usuário mínima - 17/04/2024
3. Código fonte parcial para os testes - 24/04/2024
4. Relatório de testes preliminares e correções - 01/05/2024
5. Funcionalidades básicas - 08/05/2024
6. Interface de usuário melhorada - 15/05/2024
7. Relatório de testes finais e código ajustado - 22/05/2024
8. Documentação final do projeto - 01/06/2024
9. Apresentação final do projeto - 15/06/2024

## 6. Recursos Necessários

### Equipe de Desenvolvimento

- Alex
- José
- Pedro
- Sara
- Wallace

### Ambiente de Desenvolvimento

- **Linguagem de Programação:** JavaScript
- **Ferramenta de Desenvolvimento:** Visual Studio Code (VSCode)

### Banco de Dados

- **XAMPP:** Inclui Apache (servidor web) e MySQL (banco de dados relacional). Fornece um ambiente integrado para desenvolvimento e testes.
- **MySQL:** Sistema de gerenciamento de banco de dados relacional para armazenar e gerenciar dados de forma eficiente.

## 7. Prints do Sistema

### Página Inicial
![Página Inicial](https://raw.githubusercontent.com/AlexCamposDosSantos/Oficina-das-Rodas/main/Prints/print1.jpeg)
### Cadastro - Empresa
![Página Inicial](https://raw.githubusercontent.com/AlexCamposDosSantos/Oficina-das-Rodas/main/Prints/print2.jpeg)
### Cadastro - Usuário
![Página Inicial](https://raw.githubusercontent.com/AlexCamposDosSantos/Oficina-das-Rodas/main/Prints/print3.jpeg)
### Cadastro - Cliente
![Página Inicial](https://raw.githubusercontent.com/AlexCamposDosSantos/Oficina-das-Rodas/main/Prints/print4.jpeg)
### Abrir O.S
![Página Inicial](https://raw.githubusercontent.com/AlexCamposDosSantos/Oficina-das-Rodas/main/Prints/print5.jpeg)
### Controle O.S
![Página Inicial](https://raw.githubusercontent.com/AlexCamposDosSantos/Oficina-das-Rodas/main/Prints/print6.jpeg)
### Relatórios e Termos
![Página Inicial](https://raw.githubusercontent.com/AlexCamposDosSantos/Oficina-das-Rodas/main/Prints/print7.jpeg)
