------------------------------------------------------------------------------------DEVOPS PROJET---------------------------------------------------------------------------------------

=>Comment realiser le projet:

0-
  - mkdir <name>
  - cd <name>


1-L'installation de Vagrant:
	- curl -O https://releases.hashicorp.com/vagrant/2.2.9/vagrant_2.2.9_x86_64.deb
	- apt install ./vagrant_2.2.9_x86_64.deb

2- L'installation de Ansible:
	-apt install ansible

3- L'initialisation de la box vagrant:
	-vagrant init bento/ubuntu-16.04	
	-apres cette initialisation un fichier appellé Vagrantfile sera crée

4- Dans votre chemin d'acces principale:
	-touch hosts 
	-touch playbook.yml

5-
	-  mkdir roles && cd roles > mkdir mysql && mkdir apache2 > cd mysql & mkdir files(ici votre db et votre script.php) + mkdir tasks && touch main.yml(ici vos jeux)
   	-  meme chose pour le role apache2

6- Configuration du Vagrantfile:
	-provider settings: pour la creation de la machine guest:
		
		config.vm.provider "virtualbox" do |vb|
			 vb.memory = <MB> #choisissez les valeurs qui vous conviennent
 			 vb.cpus = <cpus> #-------------------------------------------
		end  
		
	-network settings: attribué une addresse ip privée et rederiger le port 80 a un autre port(eg 8888):
		  
		  config.vm.network "private_network", ip: "192.168.56.1"
		  config.vm.network "forwarded_port", guest: 80, host:8880
	
	-provisioner settings: dans ce cas j'utilise ansible mais vous pouvez tres faire un script shell

		  config.vm.provision "ansible" do |ansible|
			ansible.verbose = "v"
			ansible.playbook = "playbook.yml"
	          end

7- Configuration du fichier hosts:
	-attribué une addr ip et votre dns

8- Configuration du playbook:
	- doit contenir :
		- hosts
		- tasks ou roles qui eux contiennent les tasks pour eviter d'avoir un long fichier et une lente execution


9- configuration des fichier main.yml:
   - nano ./roles/apache2/tasks/main.yml
   - ecrire vos taches
   =>> meme chose pour le roles mysql

10- Creation de la box:
	-vagrant up
	-votre fichier Vagrantfile sera lu et votre playbook.yml aussi puis vos tasks seront executés

11- Checker l'installation:
	- vagrant status
	- vagrant ssh > php -v && mysql -version
	- curl http://<ip_addr>:port


