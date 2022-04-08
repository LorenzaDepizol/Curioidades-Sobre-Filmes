-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Jun-2021 às 00:15
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `curiosidades`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE `admin` (
  `idAdmin` int(11) NOT NULL,
  `EmailAdmin` varchar(50) NOT NULL,
  `SenhaAdmin` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`idAdmin`, `EmailAdmin`, `SenhaAdmin`) VALUES
(1, 'yily.isxim9@hotmail.com', '1251514118415j'),
(2, 'sqcbnqyg.ndgqs13@hotmail.com', '9261415181j');

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacoes`
--

CREATE TABLE `avaliacoes` (
  `idAvaliacao` int(11) NOT NULL,
  `Avaliacao` float NOT NULL,
  `ComentarioAvaliacao` varchar(800) DEFAULT NULL,
  `idFilme` int(11) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `avaliacoes`
--

INSERT INTO `avaliacoes` (`idAvaliacao`, `Avaliacao`, `ComentarioAvaliacao`, `idFilme`, `ID`) VALUES
(1, 10, 'slaa', 60, 1),
(2, 5, 'Horrivel', 60, 3),
(3, 10, '', 48, 3),
(4, 10, '', 48, 1),
(5, 10, 'Um dos meus filmes favoritos', 38, 1),
(6, 10, '', 5, 1),
(7, 10, 'muito bom', 13, 1),
(8, 10, 'incrivel', 47, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `favoritos`
--

CREATE TABLE `favoritos` (
  `idFavoritos` int(11) NOT NULL,
  `idFilme` int(11) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `favoritos`
--

INSERT INTO `favoritos` (`idFavoritos`, `idFilme`, `ID`) VALUES
(3, 48, 1),
(6, 13, 1),
(10, 33, 1),
(11, 14, 1),
(12, 52, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `filmes`
--

CREATE TABLE `filmes` (
  `idFilme` int(11) NOT NULL,
  `TituloFilme` varchar(30) NOT NULL,
  `DescricaoFilme` varchar(1000) NOT NULL,
  `ClassIndicativa` int(2) DEFAULT NULL,
  `DataLancamento` date NOT NULL,
  `Diretor` varchar(50) NOT NULL,
  `Genero` int(1) NOT NULL,
  `Poster` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `filmes`
--

INSERT INTO `filmes` (`idFilme`, `TituloFilme`, `DescricaoFilme`, `ClassIndicativa`, `DataLancamento`, `Diretor`, `Genero`, `Poster`) VALUES
(1, 'Mortal Kombat', 'Nova aventura baseada no videogame Mortal Kombat. Na história, um jovem que nunca treinou artes marciais acaba envolvido em um gigantesco torneio de luta envolvendo guerreiros da Terra e lutadores e outras dimensões', 18, '2021-04-16', 'Simon McQuoid', 1, 'https://www.themoviedb.org/t/p/w300/w8BVC3qrCWCiTHRz4Rft12dtQF0.jpg'),
(2, 'Sem Remorso', 'Um agente da CIA busca vingança depois de sua namorada ter sido morta por um traficante de Baltimore.', 16, '2021-04-30', 'Stefano Sollima', 1, 'https://www.themoviedb.org/t/p/w300/uHEZ4ZMziIjlAgCTQAEh9ROvtj0.jpg'),
(3, 'Liga da Justiça - Zack Snyder', 'Determinado a garantir que o sacrifício final do Superman não foi em vão, Bruce Wayne alinha forças com Diana Prince com planos de recrutar uma equipe de metahumanos para proteger o mundo de uma ameaça de proporções catastróficas que se aproxima.', 16, '2021-03-18', 'Zack Snyder', 1, 'https://www.themoviedb.org/t/p/w300/ArWn6gCi61b3b3hclD2L0LOk66k.jpg'),
(4, 'Venom', 'O jornalista Eddie Brock desenvolve força e poder sobre-humanos quando seu corpo se funde com o alienígena Venom. Dominado pela raiva, Venom tenta controlar as novas e perigosas habilidades de Eddie.', 14, '2018-10-05', 'Ruben Fleischer', 1, 'https://www.themoviedb.org/t/p/w300/qZK4LSj7crL6RNGUfD1LSJioA4u.jpg'),
(5, 'Aves de Rapina', 'Arlequina, Canário Negro, Caçadora, Cassandra Cain e a policial Renée Montoya formam um grupo inusitado de heroínas. Quando um perigoso criminoso começa a causar destruição em Gotham, as cinco mulheres precisam se unir para defender a cidade.', 16, '2020-02-06', 'Cathy Yan', 1, 'https://www.themoviedb.org/t/p/w300/3C0AGhDtCU1kvRJErekyu7PPpyH.jpg'),
(6, 'My Hero Academy: Ascensão de H', 'Izuku, Bakugo e o resto dos alunos da Turma A da Academia de Heróis terão que unir forças mais uma vez para enfrentar o vilão, Nine.', 0, '2020-02-26', 'Kōhei Horikoshi', 1, 'https://www.themoviedb.org/t/p/w300/Ar8jquseIADaFtMH6dQpskLwDYf.jpg'),
(7, 'Velozes e Furiosos: Hobbes e S', 'Desde que se conheceram, em \"Velozes & Furiosos 7\", Luke Hobbs (Dwayne Johnson) e Deckard Shaw (Jason Statham) constantemente bateram de frente, não só por inicialmente estarem em lados opostos mas, especialmente, pela personalidade de cada um. Agora, a dupla precisa unir forças para enfrentar Brixton (Idris Elba), um anarquista alterado geneticamente que se tornou uma ameaça biológica global. Para tanto, eles contam com a ajuda de Hattie (Vanessa Kirby), irmã de Shaw, que é também agente do MI6, o serviço secreto britânico.', 14, '2019-08-01', 'David Leitch', 1, 'https://www.themoviedb.org/t/p/w300/hWFjbklaijYSYanWQaV8sLSndeI.jpg'),
(8, 'Anonimo', 'Quando dois ladrões invadem sua casa no subúrbio uma noite, Hutch se recusa a defender a si mesmo ou a sua família, na esperança de evitar violência grave. Seu filho adolescente, Blake, está desapontado com ele e sua esposa, Becca, parece se afastar ainda mais. Em consequência, o incidente acerta a raiva latente de Hutch, desencadeando instintos adormecidos e impulsionando-o em um caminho brutal que revelará segredos obscuros e habilidades letais para salvar sua família.', 18, '2021-05-12', 'Ilya Naishuller', 1, 'https://www.themoviedb.org/t/p/w300/lzK0EYJu9ifF53O5X9P5KhUqqUd.jpg'),
(9, 'Bad Boys: Para Sempre', 'Armando é um assassino de sangue frio com uma natureza cruel e provocadora. Ele está comprometido com o trabalho do cartel e é enviado por sua mãe para matar Mike (Smith). Nuñez assumirá o papel de Rita, psicóloga criminal durona e engraçada que é recém-nomeada chefe da AMMO e é ex-namorada de Mike.', 16, '2020-01-30', 'Bilall Fallah', 1, 'https://www.themoviedb.org/t/p/w300/sTKl7J5OWnsZSTRiKPIvPx4ngBG.jpg'),
(10, 'Tyler Rake: Operação de Resgat', 'Em Bangladesh, o mercenário Tyler Rake luta para sobreviver durante a missão para resgatar o filho de um chefão do crime.', 16, '2020-04-24', 'Sam Hargrave', 1, 'https://www.themoviedb.org/t/p/w300/eE8nrIK3IILxVta3I4M6zS1RP7D.jpg'),
(11, 'A velha guarda', 'Quatro guerreiros com o dom da imortalidade protegem a humanidade há séculos. Mas seus misteriosos poderes viram alvo de ataque quando outra imortal entra em cena', 16, '2020-07-10', 'Gina Prince-Bythewood', 1, 'https://www.themoviedb.org/t/p/w300/pZOK1L88L7KoM5iNQVqNomdhjto.jpg'),
(12, 'Rei Arthur', 'Arthur é um jovem das ruas que controla os becos de Londonium e desconhece sua predestinação até o momento em que entra em contato pela primeira vez com a Excalibur. Desafiado pela espada, ele precisa tomar difíceis decisões, enfrentar seus demônios e aprender a dominar o poder que possui para conseguir, enfim, unir seu povo e partir para a luta contra o tirano Vortigern, que destruiu sua família...', 14, '2017-05-18', 'Guy Ritchie', 1, 'https://www.themoviedb.org/t/p/w300/4tGAP9Q00sqI9iF7GXnEOtkvonk.jpg'),
(13, 'Minha mãe é uma peça', 'Dona Hermínia, uma mulher de meia idade, aposentada e sozinha, tem como preocupação maior cuidar dos filhos. Mas agora que eles cresceram e não param de confrontá-la, a solução será dar um gelo e sair de casa. Sem um trabalho ou um companheiro, a dona de casa resolve desabafar com a tia idosa.', 12, '2013-06-21', 'Susana Garcia', 3, 'https://www.themoviedb.org/t/p/w300/2kj8VJEcqcxPmbuIjh5wf6FjMBH.jpg'),
(14, 'Um príncipe em Nova York', 'Akeem (Eddie Murphy), príncipe herdeiro de Zamunda, África, se rebela contra o casamento arranjando por seu pai, o rei Jaffe Joffer (James Earl Jones), que concorda que o filho viaje por 40 dias. Assim Akeem vai para Nova York, se passando por um pobre estudante para encontrar uma noiva que não o ame por sua posição. Vai trabalhar em uma lanchonete e sente-se atraído por Lisa (Shari Hadley), a filha do seu patrão, Cleo McDowell (John Amos), que é interesseiro e atrapalha o romance, pois quer um bom partido para a filha, sem imaginar quem é na verdade seu funcionário. Akeem viajou com Semmi (Arsenio Hall), seu melhor amigo, que não gosta de se passar por pobre e faz gastos e toma atitudes que podem revelar a identidade de Akeem.', 0, '1988-09-01', 'Craig Brewer', 3, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTsVfZD0InHdxWWvnO-4_n1jOEXj4_t0nTFCXXNBY3dqQOS9M-Q'),
(15, 'Sonic o Filme', 'Sonic, o porco-espinho azul mais famoso do mundo, se junta com os seus amigos para derrotar o terrível Doutor Eggman, um cientista louco que planeja dominar o mundo, e o Doutor Robotnik, responsável por aprisionar animais inocentes em robôs.', 0, '2020-02-13', 'Jeff Fowler', 3, 'https://www.themoviedb.org/t/p/w300/Kt9iFdTu5TbAm7tNfc876mrWU.jpg'),
(16, 'Tom e Jerry o Filme', 'Um gato de rua chamado Tom é contratado por uma garota chamada Kayla, uma jovem empregada que trabalha em um hotel glamouroso em Nova York, para se livrar de Jerry, um rato travesso que se mudou para o hotel, antes que ele seja a ruína de um importante casamento.', 0, '2021-02-11', 'Tim Story', 3, 'https://www.themoviedb.org/t/p/w300/9NvYyM8H6d5KAVGqpyFV9YPO5cU.jpg'),
(17, 'Hotel Transilvânia 3: Férias M', 'Solitário e infeliz, buscando um novo amor na internet, Drácula é surpreendido com um presente da querida filha: férias em um cruzeiro. Inicialmente resistente à ideia, ele acaba engajado no passeio ao se encantar pela comandante, que, no entanto, esconde um segredo nada amigável.', 0, '2018-07-12', 'Genndy Tartakovsky', 3, 'https://www.themoviedb.org/t/p/w300/fX1C1BECq6Mkv3RM74t9miaXpnV.jpg'),
(18, 'SuperBAD é hoje', 'Os estudantes adolescentes Seth e Evan têm grandes esperanças para uma festa de formatura. Os adolescentes co-dependentes pretendem beber e conquistar garotas para que eles possam se tornar parte da multidão popular da escola, mas a ansiedade de separação e dois policiais entediados complicam a auto-missão proclamada dos amigos.', 16, '2007-10-02', 'Greg Mottola', 3, 'https://www.themoviedb.org/t/p/w300/7E4f1oHmwOiKIOOiRP4EeGeaOiV.jpg'),
(19, 'Projeto X', 'Três garotos no último ano do colégio decidem fazer uma festa de aniversário para serem reconhecidos. Porém no decorrer da festa as coisas saem de controle.', 18, '2012-03-16', 'Nima Nourizadeh', 3, 'https://www.themoviedb.org/t/p/w300/m9LHVaK8oUzAVR9R94pUMUuEGr3.jpg'),
(20, 'Dupla Explosiva', 'O principal guarda-costas do mundo (Ryan Reynolds) possui um novo cliente: um assassino de aluguel (Samuel L. Jackson) que precisa testemunhar na Corte Internacional de Justiça. Por anos eles estavam em lados opostos de um tiro, mas agora eles estão presos juntos. Eles precisam colocar as diferenças de lado para chegarem ao julgamento a tempo.', 14, '2017-08-31', 'Patrick Hughes', 3, 'https://www.themoviedb.org/t/p/w300/mbgdiugQO16XNTDA1769kUWvl2v.jpg'),
(21, 'Magnatas do Crime', 'Um traficante inglês muito poderoso tenta vender seu império extremamente lucrativo para um grupo de bilionários do Oklahoma.', 16, '2020-09-04', 'Guy Ritchie', 3, 'https://www.themoviedb.org/t/p/w300/rJrGRw8L7uwoWqYVAi8NdxQwaN0.jpg'),
(22, 'A escolha perfeita', 'O The Barden Bellas é um grupo formado apenas por garotas, que apostam no visual perfeito e em sucessos pop para atrair o público da escola. Entretanto, após uma apresentação desastrosa na competição de fim de ano, suas integrantes decidem repensar o grupo. É quando surge o convite para que Beca (Anna Kendrick), uma DJ aspirante que não tem o menor interesse na vida colegial, integre a nova banda. De início Beca descarta completamente o convite, mas após conhecer Jesse (Skylar Astin), que integra uma banda formada apenas por garotos, ela resolve aceitar o convite e passa a ajudar as integrantes do The Barden Bellas a encontrar um novo visual.', 12, '2012-12-07', 'Jason Moore', 3, 'https://www.themoviedb.org/t/p/w300/pRpCQyiylNYcCzyyYHUCyf4yLm6.jpg'),
(23, 'Gente Grande', 'A morte do treinador de basquete da infância de velhos amigos os reúne no mesmo lugar que celebraram um campeonato anos atrás. Os amigos, acompanhados de suas esposas e filhos, descobrem que idade não significa o mesmo que maturidade.', 12, '2010-09-08', 'Dennis Dugan', 3, 'https://www.themoviedb.org/t/p/w300/e7Fn9QOGHljkVmK38pgtVcx5DZF.jpg'),
(24, 'Tinha que ser ele?', 'Durante as férias, Ned (Bryan Cranston) um pai superprotetor e sua família visitam a filha na Universidade de Stanford, onde ele encontra seu maior pesadelo: o bem-intencionado, mas socialmente desajeitado namorado de sua filha, um bilionário do Vale do Silício, Laird (James Franco). O certinho Ned acha que Laird, que não tem absolutamente nenhum filtro, é um par extremamente inadequado para sua filha. A rivalidade e o nível de pânico de Ned se intensificam quando ele se encontra cada vez mais fora de sintonia no glamoroso centro de alta tecnologia, e descobre que Laird está prestes a pedir sua filha em casamento.', 14, '2017-03-16', 'John Hamburg', 3, 'https://www.themoviedb.org/t/p/w300/5bggG4hnwSDsvHcoD9MAOWMSRFB.jpg'),
(25, 'A ultima casa da rua', 'Para recomeçar a vida depois do divórcio, Sarah e a filha Elissa se mudam para uma pequena cidade. Logo, descobrem o terrível segredo do local: anos antes, uma jovem matou os pais e desapareceu, deixando o irmão, Ryan, com quem Elissa acaba se envolvendo.', 14, '2012-12-07', 'Mark Tonderai', 4, 'https://www.themoviedb.org/t/p/w300/elGT91xyyxgWiKEq1fRebuXA0qI.jpg'),
(26, 'Um lugar silencioso', 'Em uma fazenda dos Estados Unidos, uma família do meio-oeste é perseguida por uma entidade fantasmagórica assustadora. Para se protegerem, eles devem permanecer em silêncio absoluto, a qualquer custo, pois o perigo é ativado pela percepção do som.', 14, '2018-04-05', 'John Krasinski', 4, 'https://www.themoviedb.org/t/p/w300/70XFvmFRrdVxAjne5f3ItwRBtuQ.jpg'),
(27, 'Zumbilandia: Atire duas vezes', 'Os guerreiros pós-apocalípticos Tallahassee, Columbus, Wichita e Little Rock devem confiar ainda mais em sua inteligência. Agora, eles se encontram em uma batalha implacável contra zumbis mais inteligentes, rápidos e aparentemente indestrutíveis.', 16, '2019-10-24', 'Ruben Fleischer', 4, 'https://www.themoviedb.org/t/p/w300/x8T7xy6usNhTWphfQTH7vmr4tOC.jpg'),
(28, 'A ilha da fantasia', 'Uma ilha mágica no meio do Oceano Pacífico oferece aos seus visitantes a possibilidade de realizar seus sonhos e viver aventuras que parecem impossíveis em qualquer outro lugar. Porém, como avisa o anfitrião da ilha, Sr. Roarke (Michael Pena), realizar seus desejos pode não acontecer da maneira esperada.', 16, '2020-04-09', 'Jeff Wadlow', 4, 'https://www.themoviedb.org/t/p/w300/zEae3Y5gB7e8Z3LZWsMWZcrsf92.jpg'),
(29, 'A Freira', 'Presa em um convento na Romênia, uma freira comete suicídio. Para investigar o caso, o Vaticano envia um padre assombrado e uma noviça prestes a se tornar freira. Arriscando suas vidas, a fé e até suas almas, os dois descobrem um segredo profano e se confrontam com uma força do mal que toma a forma de uma freira demoníaca e transforma o convento em um campo de batalha.', 14, '2018-09-06', 'corin hardy', 4, 'https://www.themoviedb.org/t/p/w300/28vxo5DvV0nHWTbYQL8gN3hmuli.jpg'),
(30, 'Annabelle', 'Um casal se prepara para a chegada de sua primeira filha e compra para ela uma boneca. Quando sua casa é invadida por membros de uma seita, o casal é violentamente atacado e a boneca, Annabelle, se torna recipiente de uma entidade do mal.', 14, '2014-10-03', 'John R. Leonetti', 4, 'https://www.themoviedb.org/t/p/w300/ljWqakCvsAckPAFDMyghN5MSj0G.jpg'),
(31, 'Hush: A morte ouve', 'Depois de perder sua audição quando adolescente, Maddie Young (Siegel) viveu uma vida de isolamento totalmente recuada em seu mundo silencioso. Porém, quando o rosto mascarado de um assassino psicótico aparece na janela de sua casa ela deve ultrapassar seus limites físicos e psicológicos para poder sobreviver uma noite.', 14, '2016-04-08', 'Mike Flanagan', 4, 'https://www.themoviedb.org/t/p/w300/t1G9OlLHGTPRpnFnB6NHAlOqmHI.jpg'),
(32, 'Jogos Mortais: Jigsaw', 'Após uma série de assassinatos, todas as pistas levam a John Kramer, assassino mais conhecido como Jigsaw. À medida que a investigação avança, os policiais percebem que estão perseguindo o fantasma de um homem morto há mais de uma década.', 18, '2017-11-30', 'Michael Spierig', 4, 'https://www.themoviedb.org/t/p/w300/mXSnzSEuIyWWiFn5gXstnQrMn2n.jpg'),
(33, 'Quando as luzes se apagam', 'Desde que era pequena, Rebecca tinha uma porção de medos, especialmente quando as luzes se apagavam. Ela acreditava ser perseguida pela figura de uma mulher e anos mais tarde seu irmão mais novo começa a sofrer do mesmo problema. Juntos eles descobrem que a aparição está ligada à mãe deles, Rebecca começa a investigar o caso e chega perto de conhecer a terrível verdade.', 14, '2016-08-18', 'David F. Sandberg', 4, 'https://www.themoviedb.org/t/p/w300/Z1oRIlinysp3dBT58s1blpH1C2.jpg'),
(34, 'Invocação do Mal', 'Harrisville, Rhode Island, Estados Unidos, 1968. Os investigadores paranormais Ed e Lorraine Warren trabalham para ajudar uma família aterrorizada por uma presença sombria em sua fazenda. Forçados a confrontar uma entidade poderosa, os Warrens se vêem presos no caso mais aterrorizante de suas vidas. Baseado numa história real.', 14, '2013-09-13', 'James Wan', 4, 'https://www.themoviedb.org/t/p/w300/2qbYzwQEwsUE0mCYCbleFi9VriI.jpg'),
(35, 'BirdBox', 'Num mundo pós-apocalíptico, Malorie (Sandra Bullock) e os seus filhos precisam chegar a um refúgio para escapar do \"Problema\", criaturas que ao serem vistas fazem com que as pessoas se tornem extremamente violentas. De olhos vendados para não serem infectados, a família segue o curso de um rio para chegar à segurança.', 16, '2018-12-13', 'Susanne Bier', 4, 'https://www.themoviedb.org/t/p/w300/akAO6r0ZuPB98VwQsN0SGIkE4z.jpg'),
(36, 'A hora do pesadelo', 'Um grupo de adolescentes de um subúrbio americano tem um sonho em comum, envolvendo Freddy Krueger (Jackie Earle Haley). Ele é um assassino desfigurado, que sempre os persegue em seus sonhos. Enquanto eles estão acordados não há risco algum, mas quando adormecem é a chance que Krueger tem para dominá-los.', 16, '2010-05-07', 'Wes Craven', 4, 'https://www.themoviedb.org/t/p/w300/nYS9MflAMlMgo5JTNpf3aZntVF5.jpg'),
(37, 'Nova ordem espacial', 'Perseguindo detritos espaciais e sonhos distantes no ano de 2092, quatro desajustados descobrem segredos explosivos durante a tentativa de comércio de um humanoide.‎', 14, '2021-02-05', 'Jo Sung-hee', 5, 'https://www.themoviedb.org/t/p/w300/f32ne52ClTPFL9Ew2aPUhKoVn9e.jpg'),
(38, 'Godzilla vs Kong', 'Em uma época em que os monstros andam na Terra, a luta da humanidade por seu futuro coloca Godzilla e Kong em rota de colisão que verá as duas forças mais poderosas da natureza no planeta se confrontarem em uma batalha espetacular para as idades. Enquanto Monarch embarca em uma missão perigosa em terreno desconhecido e descobre pistas sobre as origens dos Titãs, uma conspiração humana ameaça tirar as criaturas, boas e más, da face da terra para sempre.', 14, '2021-04-01', 'Adam Wingard', 5, 'https://www.themoviedb.org/t/p/w300/klAIFewuqcyEmH1SMtR2XbMyqzM.jpg'),
(39, 'Oxygene', 'Uma mulher acorda sem memória dentro de uma cápsula de criogenia. O oxigênio está acabando rapidamente, e ela precisa encontrar uma forma de descobrir quem é para conseguir sobreviver.', 14, '2021-05-12', 'Alexandre Aja', 5, 'https://www.themoviedb.org/t/p/w300/taTams17ciQD5oftC65NNqTa5OT.jpg'),
(40, 'Code 8: Renegados', 'Num mundo onde pessoas com habilidades “especiais” vivem na pobreza, Conner Reed é um jovem poderoso que está a lutar para pagar pelo tratamento médico da sua mãe doente. Para ganhar dinheiro, ele entra num mundo criminoso e lucrativo, liderado por Garrett, que trabalha para um traficante de drogas.', 18, '2020-07-02', 'Jeff Chan', 5, 'https://www.themoviedb.org/t/p/w300/yOj7bYYyMMqiqgh7Bu7qxLwtbsz.jpg'),
(41, 'Jogador Nº1', 'Num futuro distópico, situado em 2044, Wade Watts, como o resto da humanidade, prefere a realidade virtual do jogo OASIS ao mundo real. No jogo, seus usuários devem descobrir a chave de um quebra-cabeça diabólico, baseado na cultura do final do século XX, para conquistar um prêmio de valor inestimável. Para vencê-lo, porém, Watts terá de abandonar a existência virtual e ceder a uma vida de amor e realidade da qual sempre tentou fugir.', 12, '2018-03-29', 'Steven Spielberg', 5, 'https://www.themoviedb.org/t/p/w300/sN46sgCsWqwgHMu4mEtKJ19knVr.jpg'),
(42, 'Projeto Gemini', 'Os estudantes adolescentes Seth e Evan têm grandes esperanças para uma festa de formatura. Os adolescentes co-dependentes pretendem beber e conquistar garotas para que eles possam se tornar parte da multidão popular da escola, mas a ansiedade de separação e dois policiais entediados complicam a auto-missão proclamada dos amigos.', 14, '2019-10-10', ' Ang Lee', 5, 'https://www.themoviedb.org/t/p/w300/5SB3NUXboAEKQy921TImJLoHel1.jpg'),
(43, 'Megatubarão', 'Na fossa mais profunda do Oceano Pacífico, a tripulação de um submarino fica presa dentro do local após ser atacada por uma criatura pré-histórica que se achava estar extinta, um tubarão de mais de 20 metros de comprimento, o Megalodon. Para salvá-los, um oceanógrafo chinês contrata Jonas Taylor, um mergulhador especializado em resgates em água profundas que já encontrou com a criatura anteriormente.', 14, '2018-08-09', 'Jon Turteltaub', 5, 'https://www.themoviedb.org/t/p/w300/kWw4mbPZaCZgXsdbwdDnrRrgpk4.jpg'),
(44, 'Os novos mutantes', 'Cinco jovens mutantes descobrem o alcance de seus poderes e lidam com traumas do passado enquanto são mantidos presos contra a vontade num sinistro hospital.', 14, '2020-10-22', 'Josh Boone', 5, 'https://www.themoviedb.org/t/p/w300/6RcWaW43UWIJzhIp6bcmui2efd.jpg'),
(45, 'Os jogos vorazes a revolta par', 'Após sobreviver à temível arena dos Jogos Vorazes, Katniss Everdeen está desanimada e destruída. Depois que a Capital reduziu o Distrito 12 a destroços, ela se refugiou no Distrito 13. Peeta Mellark foi submetido a uma lavagem cerebral, e agora está sob o domínio de Snow. Então, a presidência quer que Katniss lidere uma \"resistência\" e mobilize a população em uma empreitada que irá colocá-la no centro da trama para desmascarar Snow.', 14, '2014-11-19', 'Francis Lawrence', 5, 'https://www.themoviedb.org/t/p/w300/4SZVC5HHB9YHHiqKFL4L14qXpq6.jpg'),
(46, 'Maze Runner: Correr ou Morrer', 'Num cenário pós-apocalíptico, uma comunidade de rapazes descobre que estão presos num labirinto misterioso. Juntos, terão de descobrir como escapar, resolver o enigma e revelar o arrepiante segredo acerca de quem os colocou ali e por que razão.', 0, '2014-09-18', 'Wes Ball', 5, 'https://www.themoviedb.org/t/p/w300/orOyVAUxVN1ncz2EcrMDcTd25e8.jpg'),
(47, 'X-men:Felix Negra', 'Ambientado em 1992, Charles Xavier (James McAvoy) está lidando com o fato dos mutantes serem considerados heróis nacionais. Com o orgulho a flor da pele, ele envia sua equipe para perigosas missões, mas a primeira tarefa dos X-Men no espaço gera uma explosão solar, que acende uma força malévola e faminta por poder dentro de Jean Grey (Sophie Turner).', 12, '2019-06-06', 'Simon Kinberg', 5, 'https://www.themoviedb.org/t/p/w300/sKacZh7L9qR5jLpSnxgxung6D4Y.jpg'),
(48, 'Vingadores:Ultimato', 'Após os eventos devastadores de \"Vingadores: Guerra Infinita\", o universo está em ruínas devido aos esforços do Titã Louco, Thanos. Com a ajuda de aliados remanescentes, os Vingadores devem se reunir mais uma vez a fim de desfazer as ações de Thanos e restaurar a ordem no universo de uma vez por todas, não importando as consequências.', 12, '2019-04-25', 'Joe Russo', 5, 'https://www.themoviedb.org/t/p/w300/q6725aR8Zs4IwGMXzZT8aC8lh41.jpg'),
(49, 'A barraca do beijo', 'O primeiro beijo de Elle vira um romance proibido com o cara mais gato da escola, mas acaba colocando em risco a relação com seu melhor amigo.‎', 12, '2018-05-11', 'Vince Marcello', 2, 'https://www.themoviedb.org/t/p/w300/8TbFTREtgpTOMpxQ5ZJjiZIlVS1.jpg'),
(50, 'After: Depois da Verdade', 'Após descobrir sobre a aposta, Tessa (Josephine Langford) tenta esquecer Hardin (Hero Fiennes Tiffin), o jovem caótico e revoltado que partiu seu coração. Porém, ela está prestes a descobrir que alguns amores não podem ser superados. Hardin sabe que cometeu o pior erro de sua vida ao ter magoado a jovem tão profundamente, mas vai lutar com toda a sua força para reconquistar o grande amor da sua vida.', 14, '2020-09-02', 'Roger Kumble', 2, 'https://www.themoviedb.org/t/p/w300/aduKXG7H0z0osY8KNQjcLB3cWO5.jpg'),
(51, 'A quimica que há entre nós', 'Após ser transferida para outra escola, uma aluna do ensino médio conhece o editor do jornal do colégio logo no primeiro dia do ano letivo. O jovem, que nunca havia se apaixonado antes, percebe que tudo está prestes a mudar.', 14, '2020-08-21', 'Richard Tanne', 2, 'https://www.themoviedb.org/t/p/w300/vPoC069DhfbLHvjuSTLR60D0Sxq.jpg'),
(52, 'A vida em um ano', 'Num mundo onde pessoas com habilidades “especiais” vivem na pobreza, Conner Reed é um jovem poderoso que está a lutar para pagar pelo tratamento médico da sua mãe doente. Para ganhar dinheiro, ele entra num mundo criminoso e lucrativo, liderado por Garrett, que trabalha para um traficante de drogas.', 12, '2021-02-05', 'Mitja Okorn', 2, 'https://www.themoviedb.org/t/p/w300/dfmbwqkalJRfYqFSwNhRn4QYK30.jpg'),
(53, 'Como eu era antes de você', 'Will é um garoto rico e bem-sucedido, até sofrer um grave acidente que o deixa preso a uma cadeira de rodas. Ele está profundamente depressivo e contrata uma garota do campo para cuidar dele. Ela sempre levou uma vida modesta, com dificuldades financeiras e problemas no trabalho, mas está disposta a provar para Will que ainda existem razões para viver.', 12, '2016-07-16', 'Thea Sharrock', 2, 'https://www.themoviedb.org/t/p/w300/1UBnWvWcSJyzi5LYdVwRQbNQjsz.jpg'),
(54, 'Me chame pelo seu nome', 'O sensível e único filho da família americana com ascendência italiana e francesa Perlman, Elio está enfrentando outro verão preguiçoso na casa de seus pais na bela e lânguida paisagem italiana quando Oliver, um acadêmico que veio ajudar a pesquisa de seu pai, chega.', 14, '2018-01-18', 'Luca Guadagnino', 2, 'https://www.themoviedb.org/t/p/w300/1tsYrsceGVgC1I1AiNLDRrQytR.jpg'),
(55, 'Na mesma onda', 'Uma paixão de verão nascida sob o sol da Sicília rapidamente se transforma em uma dolorosa história de amor que obriga um jovem casal a amadurecer.', 16, '2021-03-25', 'Massimiliano Camaiti', 2, 'https://apostiladecinema.com.br/wp-content/uploads/2021/03/na-mesma-onda-critica-filme-netflix-poster.jpg'),
(56, 'Your name', 'Mitsuha é a filha do prefeito de uma pequena cidade, mas sonha em tentar a sorte em Tóquio. Taki trabalha em um restaurante em Tóquio e deseja largar o seu emprego. Os dois não se conhecem, mas estão conectados pelas imagens de seus sonhos.', 0, '2017-10-11', 'Makoto Shinkai', 2, 'https://www.themoviedb.org/t/p/w300/vfJFJPepRKapMd5G2ro7klIRysq.jpg'),
(57, 'Crepúsculo', 'Isabella Swan e seu pai, Charlie, mudaram-se recentemente. No novo colégio ela logo conhece Edward Cullen, um jovem admirado por todas as garotas locais e que mantém uma aura de mistério em torno de si. Eles aos poucos se apaixonam, mas Edward sabe que isto põe a vida de Isabella em risco.', 12, '2008-12-19', 'Catherine Hardwicke', 2, 'https://www.themoviedb.org/t/p/w300/sgxHeCZE3H9n5jQFumQPs9HBnTV.jpg'),
(58, 'Para todos os garotos que ja a', 'Lara Jean adora escrever cartas de amor secretas para seus paqueras. Só não contava que um dia elas seriam misteriosamente enviadas!', 0, '2018-08-17', 'Susan Johnson', 2, 'https://www.themoviedb.org/t/p/w300/ghcDEzN43GGUxduTJgNhKDn6a3I.jpg'),
(59, 'Ricos de Amor', 'Teto trabalha na empresa do pai e esconde suas origens para conquistar os próprios méritos. Ele se apaixona por Paula e mente sobre sua condição financeira.', 12, '2020-04-30', 'Bruno Garotti', 2, 'https://www.themoviedb.org/t/p/w300/r3TfPT015jus5d9g24DdWF0vLku.jpg'),
(60, 'A cinco passos de você', 'Dois pacientes com fibrose cística se apaixonam, apesar das regras do hospital afirmarem que eles devem manter 1,5 metros de distância entre si.', 12, '2019-03-21', 'Justin Baldoni', 2, 'https://www.themoviedb.org/t/p/w300/svEfirPJf0mBypK9UyrpLpu5xkf.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Senha` varchar(20) DEFAULT NULL,
  `StatusUser` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`ID`, `Nome`, `Email`, `Senha`, `StatusUser`) VALUES
(1, 'ManoFaria', 'leonardo@hotmail.com', '12345', 1),
(3, 'Professor', 'jean@hotmail.com', '123', 1),
(4, 'teste aleatorio', 'teste@hotmail.com', '123', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Índices para tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD PRIMARY KEY (`idAvaliacao`),
  ADD KEY `idFilme` (`idFilme`),
  ADD KEY `ID` (`ID`);

--
-- Índices para tabela `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`idFavoritos`),
  ADD KEY `idFilme` (`idFilme`),
  ADD KEY `ID` (`ID`);

--
-- Índices para tabela `filmes`
--
ALTER TABLE `filmes`
  ADD PRIMARY KEY (`idFilme`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `admin`
--
ALTER TABLE `admin`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  MODIFY `idAvaliacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `idFavoritos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `filmes`
--
ALTER TABLE `filmes`
  MODIFY `idFilme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD CONSTRAINT `avaliacoes_ibfk_1` FOREIGN KEY (`idFilme`) REFERENCES `filmes` (`idFilme`),
  ADD CONSTRAINT `avaliacoes_ibfk_2` FOREIGN KEY (`ID`) REFERENCES `usuario` (`ID`);

--
-- Limitadores para a tabela `favoritos`
--
ALTER TABLE `favoritos`
  ADD CONSTRAINT `favoritos_ibfk_1` FOREIGN KEY (`idFilme`) REFERENCES `filmes` (`idFilme`),
  ADD CONSTRAINT `favoritos_ibfk_2` FOREIGN KEY (`ID`) REFERENCES `usuario` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
