*# -*- mode: ruby -*-
# vi: set ft=ruby :


Vagrant.configure("2") do |config|

  #Inisialized box
  config.vm.box = "bento/ubuntu-16.04"

  #Provider config in order to create the guest machine
  config.vm.provider "virtualbox" do |vb|
        vb.memory = 4096
        vb.cpus = 4
    end

  #network settings
  config.vm.network "private_network", ip: "192.168.56.1"
  config.vm.network "forwarded_port", guest: 80, host:8880
  config.ssh.insert_key = false
  #to run vagrant in wsl
  config.vm.synced_folder "/root", "vagrant", disabled: true
  #provision settings
  config.vm.provision "ansible" do |ansible|
    ansible.verbose = "v"
    ansible.playbook = "playbook.yml"
  end

end
