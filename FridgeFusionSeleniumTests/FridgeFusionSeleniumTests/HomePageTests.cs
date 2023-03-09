using System.Runtime.InteropServices.JavaScript;

namespace FridgeFusionSeleniumTests;

[TestClass]
public class HomePageTests
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
    public void TestHomePageLoad()
    {
        Assert.AreEqual("Recipes for you", chromeDriver.FindElement(By.CssSelector("h1")).Text);
        Assert.AreEqual("Your ingredients so far", chromeDriver.FindElement(By.CssSelector("h4")).Text);
    }
    
    [TestMethod]
    public void TestAddIngredientEmptyIngredient()
    {
        chromeDriver.FindElement(By.CssSelector(".ingredient-box .btn")).Click();
        Assert.AreEqual("Ingredient has not been set!", chromeDriver.SwitchTo().Alert().Text);
    }

    [TestMethod]
    public void TestAddIngredientEmptyMeasure()
    {
        chromeDriver.FindElement(By.CssSelector(".selected")).Click();
        Thread.Sleep(200);
        chromeDriver.FindElement(By.CssSelector(".option:first-child")).Click();
        chromeDriver.FindElement(By.CssSelector(".ingredient-box .btn")).Click();
        Assert.AreEqual("Measure has not been set!", chromeDriver.SwitchTo().Alert().Text);
    }

    [TestMethod]
    public void TestAddIngredientInvalidMeasure()
    {
        chromeDriver.FindElement(By.CssSelector(".selected")).Click();
        Thread.Sleep(200);
        chromeDriver.FindElement(By.CssSelector(".option:first-child")).Click();
        chromeDriver.FindElement(By.CssSelector(".input:nth-child(3) .selected")).Click();
        Thread.Sleep(200);
        chromeDriver.FindElement(By.CssSelector(".input:nth-child(3) .option:first-child")).Click();
        chromeDriver.FindElement(By.CssSelector(".ingredient-box .btn")).Click();
        Assert.AreEqual("0 gram is not a valid measure!", chromeDriver.SwitchTo().Alert().Text);
    }

    [TestMethod]
    public void TestAddIngredientDefault()
    {
        chromeDriver.FindElement(By.CssSelector(".selected")).Click();
        Thread.Sleep(200);
        chromeDriver.FindElement(By.CssSelector(".option:first-child")).Click();
        chromeDriver.FindElement(By.CssSelector(".input:nth-child(3) .selected")).Click();
        Thread.Sleep(200);
        chromeDriver.FindElement(By.CssSelector(".input:nth-child(3) .option:first-child")).Click();
        chromeDriver.FindElement(By.CssSelector(".input:nth-child(2) input")).SendKeys("1");
        chromeDriver.FindElement(By.CssSelector(".ingredient-box .btn")).Click();
        Assert.AreEqual("All-purpose flour - 1 gram(s)", chromeDriver.FindElement(By.CssSelector(".ingredient-list p")).Text);
    }
    
    private void AddIngredientToTaste()
    {
        chromeDriver.FindElement(By.CssSelector(".selected")).Click();
        Thread.Sleep(200);
        chromeDriver.FindElement(By.CssSelector(".option:first-child")).Click();
        SelectToTasteMeasure();
        chromeDriver.FindElement(By.CssSelector(".ingredient-box .btn")).Click();
    }

    private void SelectToTasteMeasure()
    {
        chromeDriver.FindElement(By.CssSelector(".input:nth-child(3) .selected")).Click();
        Thread.Sleep(200);
        chromeDriver.FindElement(By.CssSelector(".input:nth-child(3) .option:nth-child(3)")).Click();
    }

    [TestMethod]
    public void TestAddIngredientToTaste()
    {
        AddIngredientToTaste();
        Assert.AreEqual("All-purpose flour - to taste", chromeDriver.FindElement(By.CssSelector(".ingredient-list p")).Text);
    }
    
    [TestMethod]
    public void TestDeleteIngredient()
    {
        AddIngredientToTaste();
        Assert.AreEqual("All-purpose flour - to taste",
            chromeDriver.FindElement(By.CssSelector(".ingredient-list p")).Text);
        chromeDriver.FindElement(By.CssSelector(".fa-x")).Click();
        Assert.ThrowsException<NoSuchElementException>(() =>
            chromeDriver.FindElement(By.CssSelector(".ingredient-list p")).Text);
    }

    [TestMethod]
    public void TestOrderRecipesOneElement()
    {
        chromeDriver.FindElement(By.CssSelector(".selected")).Click();
        Thread.Sleep(200);
        chromeDriver.FindElement(By.CssSelector(".search-box input")).SendKeys("fra");
        chromeDriver.FindElement(By.Id("ingredient-117-option")).Click();
        SelectToTasteMeasure();
        chromeDriver.FindElement(By.CssSelector(".ingredient-box .btn")).Click();
        Assert.AreEqual("Beef Stroganoff",
        chromeDriver.FindElement(By.CssSelector(".recipe-container .row:first-child .card-title")).Text);
    }

    [TestMethod]
    public void TestOrderRecipesMultipleElements()
    {
        chromeDriver.FindElement(By.CssSelector(".selected")).Click();
        Thread.Sleep(200);
        chromeDriver.FindElement(By.CssSelector(".search-box input")).SendKeys("fra");
        chromeDriver.FindElement(By.Id("ingredient-117-option")).Click();
        SelectToTasteMeasure();
        chromeDriver.FindElement(By.CssSelector(".ingredient-box .btn")).Click();
        
        chromeDriver.FindElement(By.CssSelector(".selected")).Click();
        Thread.Sleep(200);
        chromeDriver.FindElement(By.CssSelector(".search-box input")).SendKeys("mush");
        chromeDriver.FindElement(By.Id("ingredient-10-option")).Click();
        SelectToTasteMeasure();
        chromeDriver.FindElement(By.CssSelector(".ingredient-box .btn")).Click();
        
        Assert.AreEqual("Beef Stroganoff",
            chromeDriver.FindElement(By.CssSelector(".recipe-container .row:first-child .card-title")).Text);
        Assert.AreEqual("Stuffed Mushrooms",
            chromeDriver.FindElement(By.CssSelector(".recipe-container .row:first-child .col-12:nth-child(2) .card-title")).Text);
    }

    private void SelectGramMeasure()
    {
        chromeDriver.FindElement(By.CssSelector(".input:nth-child(3) .selected")).Click();
        Thread.Sleep(200);
        chromeDriver.FindElement(By.CssSelector(".input:nth-child(3) .option:nth-child(1)")).Click();
    }
    
    [TestMethod]
    public void TestOrderRecipesWithDifferentMeasures()
    {
        chromeDriver.FindElement(By.CssSelector(".selected")).Click();
        Thread.Sleep(200);
        chromeDriver.FindElement(By.CssSelector(".search-box input")).SendKeys("pot");
        chromeDriver.FindElement(By.Id("ingredient-89-option")).Click();
        SelectGramMeasure();
        chromeDriver.FindElement(By.CssSelector(".input:nth-child(2) input")).SendKeys("8");
        chromeDriver.FindElement(By.CssSelector(".ingredient-box .btn")).Click();
        
        chromeDriver.FindElement(By.CssSelector(".selected")).Click();
        Thread.Sleep(200);
        chromeDriver.FindElement(By.CssSelector(".search-box input")).SendKeys("carr");
        chromeDriver.FindElement(By.Id("ingredient-59-option")).Click();
        SelectGramMeasure();
        chromeDriver.FindElement(By.CssSelector(".input:nth-child(2) input")).SendKeys("7");
        chromeDriver.FindElement(By.CssSelector(".ingredient-box .btn")).Click();
        
        Assert.AreEqual("Beef Stew",
            chromeDriver.FindElement(By.CssSelector(".recipe-container .row:first-child .card-title")).Text);
        Assert.AreEqual("Beef Stir Fry",
            chromeDriver.FindElement(By.CssSelector(".recipe-container .row:first-child div:nth-child(3) .card-title")).Text);
    }

    [TestMethod]
    public void TestReorderAfterDelete()
    {
        AddIngredientToTaste();
        Assert.AreEqual("Banana Bread",
            chromeDriver.FindElement(By.CssSelector(".recipe-container .row:first-child .card-title")).Text);
        chromeDriver.FindElement(By.CssSelector(".fa-x")).Click();
        Assert.AreEqual("Apple Pie",
            chromeDriver.FindElement(By.CssSelector(".recipe-container .row:first-child .card-title")).Text);
    }

    [TestMethod]
    public void TestOrderWithMatchingIngredients()
    {
        AddIngredientToTaste();
        
        chromeDriver.FindElement(By.CssSelector(".selected")).Click();
        Thread.Sleep(200);
        chromeDriver.FindElement(By.CssSelector(".search-box input")).SendKeys("blue");
        chromeDriver.FindElement(By.Id("ingredient-161-option")).Click(); ;
        SelectToTasteMeasure();
        chromeDriver.FindElement(By.CssSelector(".ingredient-box .btn")).Click();
        
        Assert.AreEqual("Blueberry Pie",
            chromeDriver.FindElement(By.CssSelector(".recipe-container .row:first-child .card-title")).Text);
        Assert.AreEqual("Blueberry Pie",
            chromeDriver.FindElement(By.CssSelector(".recipe-container .row:first-child div:nth-child(2) .card-title")).Text);
    }
    
    [TestCleanup]
    public void Cleanup()
    {
        chromeDriver.Quit();
    }
}