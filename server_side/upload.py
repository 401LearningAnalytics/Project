#!/usr/bin/env python3
import sys
import os
import subprocess
import time

filename = sys.argv[1]
print("extracting " + filename)
p = subprocess.Popen(["unzip", filename, "-dintro"], stdout=subprocess.PIPE)
p.communicate()


p = subprocess.Popen(["php","-f","uploadtodb.php","intro/courses.csv","courses"],stdout=subprocess.PIPE, universal_newlines=True)
out, err = p.communicate()

p = subprocess.Popen(["php","-f","uploadtodb.php","intro/users.csv","users"],stdout=subprocess.PIPE, universal_newlines=True)
out, err = p.communicate()

p = subprocess.Popen(["php","-f","uploadtodb.php","intro/course_formative_quiz_grades.csv","course_formative_quiz_grades"],stdout=subprocess.PIPE, universal_newlines=True)
out, err = p.communicate()

p = subprocess.Popen(["php","-f","uploadtodb.php","intro/course_item_passing_states.csv","course_item_passing_states"],stdout=subprocess.PIPE, universal_newlines=True)
out, err = p.communicate()

p = subprocess.Popen(["php","-f","uploadtodb.php","intro/course_passing_states.csv","course_passing_states"],stdout=subprocess.PIPE, universal_newlines=True)
out, err = p.communicate()

p = subprocess.Popen(["php","-f","uploadtodb.php","intro/course_grades.csv","course_grades"],stdout=subprocess.PIPE, universal_newlines=True)
out, err = p.communicate()

p = subprocess.Popen(["php","-f","uploadtodb.php","intro/course_modules.csv","course_modules"],stdout=subprocess.PIPE, universal_newlines=True)
out, err = p.communicate()

p = subprocess.Popen(["php","-f","uploadtodb.php","intro/course_lessons.csv","course_lessons"],stdout=subprocess.PIPE, universal_newlines=True)
out, err = p.communicate()

p = subprocess.Popen(["php","-f","uploadtodb.php","intro/course_items.csv","course_items"],stdout=subprocess.PIPE, universal_newlines=True)
out, err = p.communicate()

p = subprocess.Popen(["php","-f","uploadtodb.php","intro/course_item_grades.csv","course_item_grades"],stdout=subprocess.PIPE, universal_newlines=True)
out, err = p.communicate()

p = subprocess.Popen(["php","-f","uploadtodb.php","intro/course_item_types.csv","course_item_types"],stdout=subprocess.PIPE, universal_newlines=True)
out, err = p.communicate()

subprocess.call("rm intro/*", shell=True)

