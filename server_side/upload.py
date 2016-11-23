#!/usr/bin/env python3
import sys
import os
import subprocess
import time

filename = sys.argv[1]
print("extracting" + filename)
p = subprocess.Popen(["unzip", filename, "-dintro"], stdout=subprocess.PIPE)
p.communicate()

subprocess.call("rm intro/*.html intro/*.pdf", shell=True)
p = subprocess.Popen(["ls", "intro"],stdout=subprocess.PIPE, universal_newlines=True)
output, error = p.communicate()
file_list = str(output).split("\n")
#while len(file_list) != 0:
#    for i in file_list:
#        k = "intro/"+i
#        p = subprocess.Popen(["php","-f","uploadtodb.php",k],stdout=subprocess.PIPE, universal_newlines=True)
#        out, err = p.communicate()
#        if ("Error" in out) or ("error" in out):
#                print(k)
#        else:
#                file_list.remove(i)
print(file_list)
