Vagrant.configure("2") do |config|
  config.vm.box = "damianlewis/lamp-php7.1"
  config.vm.network "forwarded_port", guest: 80, host: 4567, host_ip: "127.0.0.1"
  config.vm.synced_folder "./www", "/var/www/html"
  config.vm.provision "shell", inline: <<-SHELL
        apt-get update
  SHELL
end
