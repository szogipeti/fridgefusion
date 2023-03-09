using OpenQA.Selenium.Chrome;
using OpenQA.Selenium.Support.UI;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace FridgeFusionSeleniumTests
{
    [TestClass]
    public class LoginTests
    {
        private ChromeDriver chromeDriver;

        [TestInitialize]
        public void Initialize()
        {
            chromeDriver = new ChromeDriver();
            chromeDriver.Manage().Window.Maximize();
            chromeDriver.Navigate().GoToUrl("http://localhost:8881/#/login");
        }
        [TestCleanup]
        public void TearDown()
        {
            chromeDriver.Quit();
        }
        [TestMethod]
        public void TestLoginwWithRealUser() 
        {
            IWebElement emailInput = chromeDriver.FindElement(By.Name("email"));
            emailInput.SendKeys("gastroworkshop@gmail.com");

            IWebElement passwordInput = chromeDriver.FindElement(By.Name("password"));
            passwordInput.SendKeys("1nimda");
          
            IWebElement loginButton = chromeDriver.FindElement(By.CssSelector(".btn"));
            loginButton.Click();
            Thread.Sleep(5000);
            Assert.AreEqual("http://localhost:8881/#/", chromeDriver.Url);
        }
        [TestMethod]
        public void TestLoginwWithwrongUsername()
        {
            IWebElement emailInput = chromeDriver.FindElement(By.Name("email"));
            emailInput.SendKeys("apple@alma.hu");

            IWebElement passwordInput = chromeDriver.FindElement(By.Name("password"));
            passwordInput.SendKeys("Alma12345");

            IWebElement loginButton = chromeDriver.FindElement(By.CssSelector(".btn"));
            loginButton.Click();
            Thread.Sleep(10000);
            Assert.AreEqual("Unsuccessful login", chromeDriver.FindElement(By.Id("error")).Text);
        }
        [TestMethod]
        public void TestLoginwWithwrongPassword()
        {
            IWebElement emailInput = chromeDriver.FindElement(By.Name("email"));
            emailInput.SendKeys("gastroworkshop@gmail.com");

            IWebElement passwordInput = chromeDriver.FindElement(By.Name("password"));
            passwordInput.SendKeys("alma123");

            IWebElement loginButton = chromeDriver.FindElement(By.CssSelector(".btn"));
            loginButton.Click();
            Thread.Sleep(10000);
            Assert.AreEqual("Unsuccessful login", chromeDriver.FindElement(By.Id("error")).Text);
        }
    }
}
