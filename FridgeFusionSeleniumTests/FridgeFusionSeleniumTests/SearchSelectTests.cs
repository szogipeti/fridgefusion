namespace FridgeFusionSeleniumTests;

[TestClass]
public class SearchSelectTests
{
    private ChromeDriver chromeDriver;
    
    [TestInitialize]
    public void Initialize()
    {
        chromeDriver = new ChromeDriver();
        chromeDriver.Manage().Window.Maximize();
        chromeDriver.Navigate().GoToUrl("http://localhost:8881");
        Thread.Sleep(8000);
    }

    [TestMethod]
    public void TestHomePageLoad()
    {
        Assert.AreEqual("Recipes for you", chromeDriver.FindElement(By.CssSelector("h1:first-child")).Text);
        Assert.AreEqual("Your ingredients so far", chromeDriver.FindElement(By.CssSelector("h4:first-child")).Text);
    }
    
    [TestMethod]
    public void TestSearchSelectNormal()
    {
        chromeDriver.FindElement(By.CssSelector(".selected")).Click();
        Thread.Sleep(200);
        chromeDriver.FindElement(By.CssSelector(".option:first-child")).Click();
        Assert.AreEqual("All-purpose flour", chromeDriver.FindElement(By.CssSelector(".selected p")).Text);
    }

    [TestMethod]
    public void TestSearchSelectSearch()
    {
        chromeDriver.FindElement(By.CssSelector(".selected")).Click();
        Thread.Sleep(200);  
        chromeDriver.FindElement(By.CssSelector(".search-box input")).SendKeys("z");
        chromeDriver.FindElement(By.Id("ingredient-135-option")).Click();
        Assert.AreEqual("Frozen peas", chromeDriver.FindElement(By.CssSelector(".selected p")).Text);
    }

    [TestMethod]
    public void TestEmptySearchAfterSearchSelectClosed()
    {
        chromeDriver.FindElement(By.CssSelector(".selected")).Click();
        Thread.Sleep(200);  
        chromeDriver.FindElement(By.CssSelector(".search-box input")).SendKeys("z");
        chromeDriver.FindElement(By.CssSelector(".selected")).Click();
        chromeDriver.FindElement(By.CssSelector(".selected")).Click();
        Thread.Sleep(200);  
        Assert.AreEqual("", chromeDriver.FindElement(By.CssSelector(".search-box input")).Text);
    }

    [TestCleanup]
    public void Cleanup()
    {
        chromeDriver.Quit();
    }
}