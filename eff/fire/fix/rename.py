import os
def get_all_files(path):
    files = []
    for root, dirs, filenames in os.walk(path):
        for f in filenames:
            files.append(os.path.join(root, f))
    return files

res=get_all_files(".")

all=[]
j=0
for i in res:
    if(i[-3:]==".py"):
        continue
    #將檔案重新命名
    os.rename(i.replace(".\\",""),"eff_fire_"+str(j)+".jpg")
    j+=1
print(all)