# Needs to be installed and imported, maybe I'll package it once I bother to bundle all the classes into a single app.
from wonderwords import RandomWord
# Import suffices
import math
import random
import sys
import datetime
# Stores stdout so it can be restored later, don't really know if I have to do this.
or_stdout = sys.stdout

# Assigns alis to RandomWord
r = RandomWord()
# Opens file to edit.
f = open("items.txt","a")
# Main loop, uses index for primary keys and prints 100 results
for i in range (1,101,1):
    # Variables name, pin, pot and output are assigned only for clarity they aren't really necessary.
    name = r.word(include_parts_of_speech=["adjectives"])+" "+r.word(include_parts_of_speech=["nouns","adjectives"])
    pin = random.randint(0,1)*1000+random.randint(0,9)*100+random.randint(0,9)*10+random.randint(0,9)+(round(random.random(),2))
    pot = round(pin*1.22,2)
    # Takes two dates, calculates the number of days between them, then generates a number under than range and adds it to the starting date.
    why = datetime.date(2010,1,1) + datetime.timedelta(days=random.randrange((datetime.date(2022,6,1) - datetime.date(2010,1,1)).days))
    
    # This is the string that will be returned
    # We could make this go directly into the database but I'll figure it out later.
    output = "INSERT INTO ITEM VALUES(\'IT0"+i+"'\,\'"+name+"\',"+str(pot)+","+str(pin)+","+str(random.randint(1,39))+","+str(random.randint(1,4))+","+str(random.randint(1,4))+","+str(random.randint(1,4))+","+str(random.randint(1,10))+","+str(random.randint(1,6))+","+str(random.randint(1,6))+",\'"+str(why)+"\');\n"
    # This line tells it to write the output to the Notepad.
    f.write(output)
# Restores stdout to the initial value, once again, I'm not sure this is necessary at all.
sys.stdout = or_stdout