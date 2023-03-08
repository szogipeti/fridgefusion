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
    class RegisterTests
    {
        private ChromeDriver chromeDriver;

        [TestInitialize]
        public void Initialize()
        {
            chromeDriver = new ChromeDriver();
            chromeDriver.Manage().Window.Maximize();
            chromeDriver.Navigate().GoToUrl("http://localhost:8881/register");
            Thread.Sleep(10000);
        }
        [TestCleanup]
        public void TearDown()
        {
            chromeDriver.Quit();
        }
        [TestMethod]
        public void TestLoginwWithRealUser()
        {
            IWebElement usernameInput = chromeDriver.FindElement(By.Name("username"));
            usernameInput.SendKeys("");

            IWebElement emailInput = chromeDriver.FindElement(By.Name("email"));
            emailInput.SendKeys("alma@alma.hu");

            IWebElement passwordInput = chromeDriver.FindElement(By.Name("password"));
            passwordInput.SendKeys("Alma123");

            IWebElement passwordInput = chromeDriver.FindElement(By.Name("Confirm-password"));
            passwordInput.SendKeys("Alma123");

            IWebElement loginButton = chromeDriver.FindElement(By.CssSelector(".btn-login"));
            loginButton.Click();

            Assert.AreEqual("\"http://localhost:8881/", chromeDriver.Url);
        }
        [TestMethod]
        public void TestLoginwWithFakeUser()
        {
            IWebElement emailInput = chromeDriver.FindElement(By.Name("email"));
            emailInput.SendKeys("apple@alma.hu");

            IWebElement passwordInput = chromeDriver.FindElement(By.Name("password"));
            passwordInput.SendKeys("Alma12345");

            IWebElement loginButton = chromeDriver.FindElement(By.CssSelector(".btn-register"));
            loginButton.Click();

            Assert.AreEqual("\"http://localhost:8881/login", chromeDriver.Url);
        }
    }
}
