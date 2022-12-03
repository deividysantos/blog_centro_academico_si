## Semestre
####  id_semestre,
####  data_inicio,
####  data_fim,
####  descricao

## Usuarios
####  id_usuario,
####  login,
####  senha,
####  url_foto,
####  nome,
####  email,
####  telefone,
####  inativo

## Cargos 
####  id_cargo,
####  nome,
####  nivel_hierarquia

## Eleicao
####  id_eleicao,
####  id_semestre,
####  id_usuario,
####  id_cargo

## Posts
####  id_post,
####  titulo,
####  descricao,
####  imagem,
####  texto,
####  id_usuario as criador,
####  data_postagem,
####  id_evento,
####  inativo

## Sujestoes
####  id_sugestao,
####  titulo,
####  texto,
####  data_envio,
####  [ aberta, fechada ] as status,
####  identificador_navegador -> usar para ignorar requests seguidas de um mesmo usuário

## Eventos
####  id_evento,
####  titulo,
####  descricao,
####  url_img,
####  data,
####  concluido