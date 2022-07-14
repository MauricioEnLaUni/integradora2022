from random import randint
from sys import stdout
from wonderwords import RandomWord

# Stores stdout so it can be restored later, don't really know if I have to do this.
or_stdout = stdout
# Assigns alis to RandomWord
r = RandomWord()

countries = {
    "MX" : "Aguascalientes",
    "BE" : "Belmopan",
    "US" : "Houston",
    "GU" : "Cd. de Guatemala",
    "CU" : "La Habana",
    "CA" : "Ottawa"
}
# Opens file to edit.
f = open("address.txt","a")
for i in range(200):
    ct = list(countries)[0] if randint(1,10) >= 8 else list(countries)[randint(1,5)]
    cy = countries[ct]
    f.write("INSERT INTO ADDRESS VALUES(\'AD0"+i+"\',"+str(randint(100,1500))+",\""+r.word(include_parts_of_speech=["nouns"])+"\",\""+str(randint(100,999999))+"\",\""+r.word(include_parts_of_speech=["nouns"])+"\",\""+cy+"\",\""+ct+"\");\n")
# Restores stdout to the initial value, once again, I'm not sure this is necessary at all.
stdout = or_stdout