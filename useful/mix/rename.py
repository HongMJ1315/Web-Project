import os
def get_all_files(path):
    files = []
    for root, dirs, filenames in os.walk(path):
        for f in filenames:
            files.append(os.path.join(root, f).replace(".\\",""))
    return files

res=get_all_files(".")
print(res)

all=[]
j=0
for i in res:
    
    if(i[-3:]==".py") or (i=="border.png"):
        continue
    #將檔案重新命名
<<<<<<< HEAD
    os.rename(i.replace(".\\",""),"eff_booldloss_"+str(j)+".png")
=======
    os.rename(i.replace(".\\",""),"def_"+str(j)+".png")
>>>>>>> 7f4b19a182dd3a0fffb8728b6611b5b18869a6d2
    j+=1