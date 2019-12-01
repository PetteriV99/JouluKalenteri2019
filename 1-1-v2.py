def main():
    f1 = open("1-1-input.txt", "r")    
    if (f1.mode == 'r'):
        contents = f1.readlines()
        total = 0
        for x in contents:
            massa = int(x)
            bensa = round(massa // 3.0 - 2.0)
            #print(bensa)
            total = total + bensa
        print (total)
        print ("done")
main()
