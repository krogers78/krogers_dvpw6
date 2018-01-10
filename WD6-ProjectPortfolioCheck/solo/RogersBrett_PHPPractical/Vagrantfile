# -*- mode: ruby -*-
# vi: set ft=ruby :


VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|

config.vm.box = "ubuntu/trusty64"
config.vm.network "private_network", ip: "127.0.0.1"  
config.vm.network "forwarded_port", guest: 80, host: 8080
config.vm.network "forwarded_port", guest: 443, host: 4443
config.vm.network "forwarded_port", guest: 3306, host: 3306


config.vm.synced_folder "./", "/var/www/html"
config.vm.provision :shell, path: "bootstrap.sh"
  
  	config.trigger.after [:provision, :up, :reload] do
      system('echo "
        rdr pass on lo0 inet proto tcp from any to 127.0.0.1 port 80 -> 127.0.0.1 port 8080  
        rdr pass on lo0 inet proto tcp from any to 127.0.0.1 port 443 -> 127.0.0.1 port 4443
        rdr pass on lo0 inet proto tcp from any to 127.0.0.1 port 3306 -> 127.0.0.1 port 3306
          rdr pass on lo0 inet proto tcp from any to 127.0.0.1 port 2222 -> 127.0.0.1 port 2222
  " | sudo pfctl -ef - > /dev/null 2>&1; echo "==> Fowarding Ports: 80 -> 8080, 2222 -> 2222, 443 -> 443, 3306 -> 3306 & Enabling pf"')  
  end

	config.trigger.after [:halt, :destroy] do
    system("sudo pfctl -df /etc/pf.conf > /dev/null 2>&1; echo '==> Removing Port Forwarding & Disabling pf'")
  end

end
