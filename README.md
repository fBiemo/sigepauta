# sigepauta
Sistema de Gestao de Pautas 

OPCCAO 1: <br> 
    REQUISITOS PARA CORRER O PROJECTO (Windows)

1- Instalacao do Xampp(eh Opcional):<br>
    1.1 execute o SCRIPT pautas_fe.sql que se encontra na raiz do proj.  
    1.2 No ficheiro phpMyAdmin/config.inc, e alterar as confi que 
    vem apos do comment /* Authentication type and info */
    
        1.linha alterar para 'cookie'
        2.defenir o dbUser
        3.o password dbUser (guardar as alteracoes).
        
   1.3 Abra o cmd do Xampp e execute este comando pra redefinir a senha no mysql para a que acaba de criar/
    
    mysqladmin -u root password 'sua-nova-senha' <-- nao for isto pesquise na Net!!
     
2- Coloque o projecto na pasta c:\xampp\htdocs\
3- Abra o browser e escriva localhost/sigepauta/src/  <--Eh trivial k, isto depende da estrutura do projecto <br>

NB: DESCOMENTAR AS CREDENCIAIS DO heroku 'dbconfig/db.php e getConnetion.php';

OPCCAO 2:<br> 
    REQUISITOS PARA CORRER O PROJECTO (Windows)

1- Instalar mysql na sua maquina (eh obvio que as credenciais da DB terao que ser iguias as do que estao na pasta 'dbconfig/db.php e getConnection.php')
2- Execute o SRCRIPT pautas_fe.sql
3- Instalar php na sua maquina
4- Lance o projecto em qualquer lugar que quiser
5- Abra o cmd e execute este comando no local onde estah o projecto e exatamente onde estah o 'index.php' 

    php -S localhost:'podera definir a porta onde o projecto deverah correr' (por ex:
    php -S localhost:8080)
    
6- Abra o browser e digita localhost:8080/sigepauta/src/

    
NB: se o projecto nao correr, refatora o path dos ficheiros nos arquivos 'controller/*' e 'view/integracao/fucntions/*  e view/exame/*'
Estah assim porque nao deu pra resolver essa questao a tempo
Se tiver duvida, contacte o administrador do Sistema.