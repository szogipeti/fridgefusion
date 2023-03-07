namespace FridgeFusionSeleniumTests;

[TestClass]
public class NavbarTests
{
    private ChromeDriver chromeDriver;

    [TestInitialize]
    public void Initialize()
    {
        chromeDriver = new ChromeDriver();
        chromeDriver.Manage().Window.Maximize();
        chromeDriver.Navigate().GoToUrl("http://localhost:8881");
        Thread.Sleep(10000);
    }

    [TestMethod]
    public void TestFilterRecipesByCategory()
    {
        chromeDriver.FindElement(By.CssSelector(".dropdown-toggle")).Click();
        chromeDriver.FindElement(By.CssSelector(".dropdown-menu li:first-child")).Click();
        Assert.AreEqual("Baked Brie",
            chromeDriver
                .FindElement(By.CssSelector(".recipe-container .row:nth-child(2) .col-12:first-child .card-title"))
                .Text);
    }

    [TestMethod]
    public void TestFilterResetOnHomepage()
    {
        chromeDriver.FindElement(By.CssSelector(".dropdown-toggle")).Click();
        chromeDriver.FindElement(By.CssSelector(".dropdown-menu li:first-child")).Click();
        chromeDriver.FindElement(By.CssSelector(".navbar-brand")).Click();
        Assert.AreEqual("Apple Pie",
            chromeDriver
                .FindElement(By.CssSelector(".recipe-container .row:nth-child(2) .col-12:first-child .card-title"))
                .Text);
    }

    [TestMethod]
    public void TestFilterWithOwnedIngredients()
    {
        chromeDriver.FindElement(By.CssSelector(".selected")).Click();
        Thread.Sleep(200);
        chromeDriver.FindElement(By.CssSelector(".search-box input")).SendKeys("mush");
        chromeDriver.FindElement(By.Id("ingredient-10-option")).Click();
        
        chromeDriver.FindElement(By.CssSelector(".input:nth-child(3) .selected")).Click();
        Thread.Sleep(200);
        chromeDriver.FindElement(By.CssSelector(".input:nth-child(3) .option:nth-child(3)")).Click();
        
        chromeDriver.FindElement(By.CssSelector(".ingredient-box .btn")).Click();
        
        chromeDriver.FindElement(By.CssSelector(".dropdown-toggle")).Click();
        chromeDriver.FindElement(By.CssSelector(".dropdown-menu li:first-child")).Click();
        
        Assert.AreEqual("Stuffed Mushrooms",
            chromeDriver
                .FindElement(By.CssSelector(".recipe-container .row:nth-child(2) .col-12:first-child .card-title"))
                .Text);
    }

    [TestCleanup]
    public void Cleanup()
    {
        chromeDriver.Quit();
    }
}