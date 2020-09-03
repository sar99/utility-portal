# Import scrapy
import scrapy
# Import the CrawlerProcess: for running the spider
from scrapy.crawler import CrawlerProcess
import extractSource as es

# Create the Spider class
class DC_Chapter_Spider(scrapy.Spider):
	

  name = "dc_chapter_spider"

  urls = es.createTuple('ingredientSource.csv')
  
  # start_requests method
  def start_requests(self):
    
    i = 1
    print(self.urls)
    for url in self.urls:
      print(i)
      yield scrapy.Request(url = url[1],callback = self.parse, cb_kwargs={'csspath':url[2], 'ingredient':url[0]}, dont_filter=True)
      i = i+1
      
      
      
  def parse(self, response, csspath, ingredient): 
          
        # Extra feature to get title 
    costImpure = response.css(csspath).extract_first()  
    
    cost = ""

    for i in costImpure:
        if i>='0' and i<='9':
            cost = cost+i
    
    if cost=="":
        cost="0"
          
    dc_dict[ingredient] = int(cost)

              


# Initialize the dictionary **outside** of the Spider class
dc_dict = dict()

# Run the Spider
process = CrawlerProcess()
process.crawl(DC_Chapter_Spider)
process.start()


