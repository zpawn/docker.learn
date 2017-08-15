Vagrant.configure(2) do |config|
  # box name
  config.vm.box = "bento/ubuntu-16.04"

  # Configure VM
  config.vm.provider "virtualbox" do |v|
    v.name = 'docker.learn'
    v.memory = 1024
    v.cpus = 1
  end

  # forward application port
  config.vm.network "forwarded_port", guest: 80, host: 8080

  # create private network
  config.vm.network "private_network", ip: "192.168.100.107"

  # share app folder
  config.vm.synced_folder "./", "/var/www/docker.learn", owner: 'vagrant', group: 'vagrant'

  # install nginx and dev dependencies
  config.vm.provision "shell", path: "./vagrant/bootstrap.sh"
  config.vm.provision 'shell', path: './vagrant/always-as-root.sh', run: 'always'
end
