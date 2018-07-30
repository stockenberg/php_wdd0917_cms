Vagrant.configure("2") do |config|
  config.vm.box = "damianlewis/lamp-php7.1"
  config.vm.network "forwarded_port", guest: 80, host: 4567, host_ip: "127.0.0.1"
  config.vm.synced_folder "./www", "/var/www/html"
  config.vm.provision "shell", inline: <<-SHELL
        apt-get update
        apt-get -y install phpmyadmin
        ln -s /etc/phpmyadmin/apache.conf /etc/apache2/conf-available/phpmyadmin.conf
        a2enconf phpmyadmin.conf
        service apache2 reload
  SHELL
end
