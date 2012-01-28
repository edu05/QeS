.QeS.

jerarquia de archivos:

+ index.html
 - register.html
   - sub.php
 - login.php
   + main.php
	 - add.php
	 - buscauser.php
	 - busqueda.php
	 - deletegroup.php
	 - logout.php
	 - newgroup.php
	 - perfil.php
	 - stop.php
+--------------------------------------------------+
index.html
	Login page.
register.html
	pagina de registro
sub.php
	php de registro
login.php
	php de login
main.php
	pagina principal
add.php
	php para seguir gente
buscauser.php
	php que define la clase user
busqueda.php
	php que busca usuarios por semejanza
deletegroup.php
	php que borra un grupo creado
newgroup.php
	php para crear grupos nuevos
logout.php
	php para cerrar sesion
perfil.php
	php que muestra un usuario previamente buscado
stop.php
	php para dejar de seguir a alguien

+--------------------------------------------------+
css:
index.html -> style1.css
register.html -> style2.css
main.html ->style.cs
+--------------------------------------------------+

git repository url: git://github.com/juanpablocruz/QeS.git
Branches: master, developement, cubo.

git codes:
	git clone git://github.com/juanpablocruz/QeS.git
	git fetch
	
	git branch branchname
	git checkout branchname
	
	git commit -a -m 'descripcion'
	git status 
	
	git push origin branchname (para subir el codigo, luego desde juanpablocruz/QeS.qit >> Pull request juanpablocruz @ branchname)
	

