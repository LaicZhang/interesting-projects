from PIL import Image

pngPath = ''
jpgPath = ''

def pngToJpg(pngPath, jpgPath):
    im = Image.open(pngPath)
    rgb_im = im.convert("RGB")
    rgb_im.save(jpgPath)

if __name__ == "__main__":
    pngToJpg(pngPath, jpgPath)
