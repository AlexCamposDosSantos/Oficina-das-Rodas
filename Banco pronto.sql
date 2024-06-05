-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05/06/2024 às 20:17
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `oficinadasrodas`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome_razao` varchar(100) NOT NULL,
  `cpf_cnpj` varchar(20) NOT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `estado` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome_razao`, `cpf_cnpj`, `endereco`, `cep`, `cidade`, `estado`, `email`, `telefone`, `bairro`) VALUES
(1, 'Ana Silva Oliveira', '123.456.789-00', 'Rua Vitorino Carmilo', '01153000', 'São Paulo', 'SP', 'ana.silva@email.com', '(11) 98765-4321', 'Barra Funda'),
(2, 'João da Silva', '987.654.321-00', 'Rua das Flores, 123', '01234-567', 'São Paulo', 'SP', 'joao.silva@email.com', '(11) 1234-5678', 'Centro'),
(3, 'Maria Oliveira', '555.444.333-22', 'Av. dos Anjos, 456', '04567-890', 'Rio de Janeiro', 'RJ', 'maria.oliveira@email.com', '(21) 9876-5432', 'Copacabana'),
(4, 'Carlos Pereira', '111.222.333-44', 'Rua das Palmeiras, 789', '02345-678', 'Belo Horizonte', 'MG', 'carlos.pereira@email.com', '(31) 6543-2109', 'Centro'),
(5, 'Larissa Santos', '777.888.999-00', 'Av. das Avenidas, 987', '05678-901', 'Salvador', 'BA', 'larissa.santos@email.com', '(71) 4321-0987', 'Barra'),
(6, 'Roberto Almeida', '333.222.111-00', 'Rua dos Pinheiros, 654', '07890-123', 'Curitiba', 'PR', 'roberto.almeida@email.com', '(41) 8901-2345', 'Jardim'),
(7, 'Fernanda Lima', '666.777.888-99', 'Av. das Flores, 321', '08901-234', 'Porto Alegre', 'RS', 'fernanda.lima@email.com', '(51) 3210-9876', 'Centro'),
(8, 'Ricardo Barbosa', '222.333.444-55', 'Rua das Estrelas, 543', '06789-012', 'Recife', 'PE', 'ricardo.barbosa@email.com', '(81) 8901-2345', 'Boa Viagem'),
(9, 'Amanda Costa', '888.999.000-11', 'Av. dos Girassóis, 987', '04567-890', 'Campinas', 'SP', 'amanda.costa@email.com', '(19) 7654-3210', 'Jardim'),
(10, 'Paulo Santos', '444.555.666-77', 'Rua das Pedras, 765', '03456-789', 'Fortaleza', 'CE', 'paulo.santos@email.com', '(85) 6789-0123', 'Meireles'),
(11, 'Camila Oliveira', '999.888.777-66', 'Av. dos Coqueiros, 654', '07890-123', 'Florianópolis', 'SC', 'camila.oliveira@email.com', '(48) 9012-3456', 'Centro'),
(12, 'Lucas Pereira', '111.222.333-44', 'Rua das Palmeiras, 654', '02345-678', 'Vitória', 'ES', 'lucas.pereira@email.com', '(27) 8765-4321', 'Praia'),
(13, 'Ana Silva', '777.888.999-00', 'Av. das Palmeiras, 123', '05678-901', 'Manaus', 'AM', 'ana.silva@email.com', '(92) 5432-1098', 'Centro'),
(14, 'Bruno Almeida', '333.222.111-00', 'Rua das Flores, 987', '07890-123', 'Goiânia', 'GO', 'bruno.almeida@email.com', '(62) 9876-5432', 'Setor Bueno'),
(15, 'Marina Lima', '666.777.888-99', 'Av. das Árvores, 876', '08901-234', 'Natal', 'RN', 'marina.lima@email.com', '(84) 6543-2109', 'Ponta Negra'),
(16, 'Pedro Barbosa', '222.333.444-55', 'Rua das Águas, 543', '06789-012', 'Brasília', 'DF', 'pedro.barbosa@email.com', '(61) 4321-0987', 'Asa Sul'),
(17, 'Isabela Costa', '888.999.000-11', 'Av. das Pedras, 876', '04567-890', 'Porto Velho', 'RO', 'isabela.costa@email.com', '(69) 3210-9876', 'Centro'),
(18, 'Gustavo Santos', '444.555.666-77', 'Rua dos Coqueiros, 543', '03456-789', 'Teresina', 'PI', 'gustavo.santos@email.com', '(86) 8901-2345', 'Centro'),
(19, 'Sara Oliveira', '999.888.777-66', 'Av. dos Ventos, 876', '07890-123', 'João Pessoa', 'PB', 'sara.oliveira@email.com', '(83) 9012-3456', 'Tambaú'),
(20, 'Rafael Pereira', '111.222.333-44', 'Rua das Estrelas, 543', '02345-678', 'Cuiabá', 'MT', 'rafael.pereira@email.com', '(65) 8765-4321', 'Centro'),
(21, 'Eduarda Silva', '777.888.999-00', 'Av. das Ondas, 123', '05678-901', 'Campo Grande', 'MS', 'eduarda.silva@email.com', '(67) 5432-1098', 'Centro');

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `razao_social` varchar(255) NOT NULL,
  `cnpj` varchar(18) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `cep` char(8) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `empresa`
--

INSERT INTO `empresa` (`id`, `razao_social`, `cnpj`, `email`, `cep`, `endereco`, `cidade`, `estado`, `bairro`, `telefone`) VALUES
(1, 'Tech Solutions Ltda.', '12.345.678/0001-90', 'contato@techsolutions.com.br', '03065030', 'Rua Catiguá', 'São Paulo', 'SP', 'Tatuapé', '(11) 1234-5678');

-- --------------------------------------------------------

--
-- Estrutura para tabela `os`
--

CREATE TABLE `os` (
  `num_os` int(11) NOT NULL,
  `dat_abert` date NOT NULL,
  `cliente` int(11) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `Veiculo` int(11) NOT NULL,
  `Merc_resp` varchar(100) NOT NULL,
  `Descricao` text DEFAULT NULL,
  `inf_adic` text DEFAULT NULL,
  `serv_exec` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `os`
--

INSERT INTO `os` (`num_os`, `dat_abert`, `cliente`, `Status`, `Veiculo`, `Merc_resp`, `Descricao`, `inf_adic`, `serv_exec`) VALUES
(1, '2024-06-05', 7, 'Novo', 8, 'Pedro Silva', 'O veículo apresenta problemas de partida intermitente, luzes do painel piscando e perda de potência em aceleração constante.', 'O problema começou a ocorrer após uma viagem longa.', ''),
(2, '2024-06-05', 1, 'Novo', 1, 'Mecânico João', 'Problemas no sistema elétrico do veículo', 'Cliente relatou que o problema começou após uma pane na bateria.', 'Reparo no sistema elétrico do veículo realizado com sucesso.'),
(3, '2024-06-06', 2, 'Novo', 2, 'Mecânico Pedro', 'Problemas de vibração na direção', 'Cliente informou que o problema começou após uma batida leve.', 'Realizado alinhamento e balanceamento, vibração corrigida.'),
(4, '2024-06-07', 3, 'Em atendimento', 3, 'Mecânico Maria', 'Problemas de superaquecimento', 'Cliente relatou que o problema ocorre após longos períodos de uso.', 'Realizada verificação do sistema de arrefecimento e troca do líquido de arrefecimento.'),
(5, '2024-06-08', 4, 'Concluída', 4, 'Fabio Antonio', 'Problemas no sistema de freios', 'Cliente relatou que o pedal do freio está mais baixo que o normal.', 'Identificado vazamento no cilindro mestre, peça substituída e sistema purgado.'),
(6, '2024-06-09', 5, 'Urgente', 5, 'Mecânico Carlos', 'Problemas no motor do veículo', 'Cliente relatou que o motor está fazendo barulhos estranhos e perdendo potência.', 'Realizada inspeção e identificada falha em um dos cilindros, substituída a peça defeituosa.'),
(7, '2024-06-10', 6, 'Urgente', 6, 'Mecânico João', 'Vazamento de óleo na suspensão', 'Cliente relatou que percebeu manchas de óleo no chão da garagem.', 'Realizada substituição das juntas e vedantes, sistema testado e sem vazamentos.'),
(8, '2024-06-11', 7, 'Cancelado', 7, 'Mecânico Pedro', 'Problemas no sistema de injeção', 'Cliente desistiu do reparo devido ao custo elevado.', 'OS cancelada a pedido do cliente.'),
(9, '2024-06-12', 8, 'Cancelado', 8, 'Mecânico Maria', 'Vazamento de óleo no motor', 'Cliente informou que conseguiu resolver o problema por conta própria.', 'OS cancelada a pedido do cliente.'),
(10, '2024-06-13', 9, 'Aguardando peças', 9, 'Mecânico Ana', 'Problemas no sistema de suspensão dianteira', 'Cliente foi informado que será necessária a substituição de uma peça.', 'Peça solicitada ao fornecedor, aguardando entrega.'),
(11, '2024-06-14', 10, 'Aguardando peças', 10, 'Mecânico Carlos', 'Problemas no sistema de ar condicionado', 'Cliente foi informado que será necessária a substituição de uma válvula de expansão.', 'Peça solicitada ao fornecedor, aguardando entrega.'),
(12, '2024-06-15', 11, 'Aguardando aprovação', 11, 'Mecânico João', 'Troca de pastilhas e discos de freio', 'Cliente foi informado sobre a necessidade de troca dos componentes.', 'Orçamento enviado aguardando aprovação.'),
(13, '2024-06-16', 12, 'Aguardando aprovação', 12, 'Mecânico Pedro', 'Problemas no sistema de injeção', 'Cliente foi informado sobre a necessidade de limpeza e calibração dos bicos injetores.', 'Orçamento enviado aguardando aprovação.');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `perCadUsuario` tinyint(1) NOT NULL DEFAULT 0,
  `perCadCliente` tinyint(1) NOT NULL DEFAULT 0,
  `perAbrirOs` tinyint(1) NOT NULL DEFAULT 0,
  `perRegisManutencao` tinyint(1) NOT NULL DEFAULT 0,
  `perVisualizarOs` tinyint(1) NOT NULL DEFAULT 0,
  `perCadEmpresa` tinyint(1) NOT NULL DEFAULT 0,
  `perVisualizarEmpresa` tinyint(1) NOT NULL DEFAULT 0,
  `perVisualizarCliente` tinyint(1) NOT NULL DEFAULT 0,
  `perGerarTermo` tinyint(1) NOT NULL DEFAULT 0,
  `tipo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `perCadUsuario`, `perCadCliente`, `perAbrirOs`, `perRegisManutencao`, `perVisualizarOs`, `perCadEmpresa`, `perVisualizarEmpresa`, `perVisualizarCliente`, `perGerarTermo`, `tipo`) VALUES
(1, 'Administrador', 'admin@admin.com', '123', 1, 1, 1, 1, 1, 1, 1, 1, 1, 'Administrador'),
(2, 'Gerente', 'Gerente@gerente.com', '123', 1, 1, 1, 0, 1, 0, 1, 1, 1, 'Gerente'),
(3, 'Mecanico', 'mecanico@mecanico.com', '123', 0, 0, 0, 1, 1, 0, 1, 1, 0, 'Mecanico'),
(4, 'João Pedro', 'mecanico1@oficina.com', 'senha123', 0, 0, 0, 1, 1, 0, 1, 1, 0, 'Mecânico'),
(5, 'Pedro Silva', 'mecanico2@oficina.com', 'senha123', 0, 0, 0, 1, 1, 0, 1, 1, 0, 'Mecânico'),
(6, 'Carlos da Graça', 'mecanico3@oficina.com', 'senha123', 0, 0, 0, 1, 1, 0, 1, 1, 0, 'Mecânico'),
(7, 'Fabio Antonio', 'mecanico4@oficina.com', 'senha123', 0, 0, 0, 1, 1, 0, 1, 1, 0, 'Mecânico'),
(8, 'Marcio Brito', 'mecanico5@oficina.com', 'senha123', 0, 0, 0, 1, 1, 0, 1, 1, 0, 'Mecânico');

-- --------------------------------------------------------

--
-- Estrutura para tabela `veiculo`
--

CREATE TABLE `veiculo` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `marca` varchar(100) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `ano` int(11) NOT NULL,
  `placa` varchar(20) NOT NULL,
  `quilometragem` float DEFAULT NULL,
  `renavan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `veiculo`
--

INSERT INTO `veiculo` (`id`, `cliente_id`, `marca`, `modelo`, `ano`, `placa`, `quilometragem`, `renavan`) VALUES
(1, 1, 'Fiat', 'Uno', 2015, 'ABC-1234', 50000, '12345678901'),
(2, 1, 'Chevrolet', 'Onix', 2019, 'XYZ-5678', 40000, '98765432101'),
(3, 2, 'Volkswagen', 'Gol', 2018, 'DEF-9012', 35000, '45678901234'),
(4, 3, 'Ford', 'Ka', 2020, 'HIJ-3456', 30000, '78901234567'),
(5, 4, 'Fiat', 'Palio', 2017, 'KLM-7890', 45000, '23456789012'),
(6, 5, 'Renault', 'Sandero', 2016, 'NOP-1234', 50000, '56789012345'),
(7, 6, 'Toyota', 'Corolla', 2019, 'QRS-5678', 25000, '89012345678'),
(8, 7, 'Honda', 'Civic', 2018, 'TUV-9012', 28000, '12345678901'),
(9, 8, 'Hyundai', 'HB20', 2019, 'WXY-3456', 32000, '34567890123'),
(10, 9, 'Chevrolet', 'Prisma', 2018, 'ZAB-7890', 30000, '67890123456'),
(11, 10, 'Volkswagen', 'Fox', 2017, 'BCD-1234', 35000, '90123456789'),
(12, 11, 'Ford', 'Fiesta', 2020, 'EFG-5678', 20000, '12345678901'),
(13, 12, 'Fiat', 'Siena', 2016, 'HIJ-9012', 40000, '34567890123'),
(14, 13, 'Renault', 'Logan', 2019, 'KLM-3456', 30000, '56789012345'),
(15, 14, 'Toyota', 'Etios', 2018, 'NOP-7890', 35000, '78901234567'),
(16, 15, 'Honda', 'Fit', 2017, 'QRS-1234', 40000, '90123456789'),
(17, 16, 'Hyundai', 'Creta', 2020, 'TUV-5678', 25000, '12345678901'),
(18, 17, 'Chevrolet', 'Spin', 2018, 'WXY-9012', 28000, '34567890123'),
(19, 18, 'Volkswagen', 'Voyage', 2019, 'ZAB-3456', 32000, '56789012345'),
(20, 19, 'Ford', 'EcoSport', 2017, 'BCD-7890', 30000, '78901234567'),
(21, 20, 'Fiat', 'Argo', 2018, 'EFG-1234', 35000, '90123456789'),
(22, 21, 'Renault', 'Duster', 2019, 'HIJ-5678', 40000, '12345678901');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `os`
--
ALTER TABLE `os`
  ADD PRIMARY KEY (`num_os`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `veiculo`
--
ALTER TABLE `veiculo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `os`
--
ALTER TABLE `os`
  MODIFY `num_os` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `veiculo`
--
ALTER TABLE `veiculo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `veiculo`
--
ALTER TABLE `veiculo`
  ADD CONSTRAINT `veiculo_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
