
#! /bin/bash
eval `ssh-agent`
ssh-add /home/wordmove/.ssh/heteml.pem
export RUBYOPT=-EUTF-8
echo "Success ssh-add, and encoding of ruby is UTF-8!!"
