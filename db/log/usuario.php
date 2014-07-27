<span class="usuario">
    Olá <b><?php echo $_SESSION['usuario']->nome?></b>, Seja bem Vindo.<br />
    Logou <b><?php echo $_SESSION['usuario']->contador_log?> vez(es).</b>
    Ultimo Login: <b><?php echo $_SESSION['usuario']->ultimo_log?>.</b>
    Seu IP: <b><?=$_SESSION['usuario']->ip?></b>.<br />
    <a href="pages/pageController.php?doc=pagina&pagina=loggout"><img src="images/exit.png" title="Deslogar do Sistema" alt="Deslogar do Sistema"></a>
</span>
<br class="apagar"/>
