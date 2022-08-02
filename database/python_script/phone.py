
def toFile(x,y):
    from sys import stdout
    o = stdout
    f = open(x,"a")
    f.write(y)
    stdout = o
def assign(x,y):
    from random import randint
    if(x <= y):
        a = x
    else:
        a = randint(1,10)
    return str(a)
def phone():
    from random import randint
    r = randint(100000000000000,999999999999999)
    return "\'"+str(r)+"\'"

for i in range(1,14):
    toFile("phone.txt","INSERT INTO PHONE VALUES("+str(i)+","+
    assign(i,10)+","+phone()+");\n")